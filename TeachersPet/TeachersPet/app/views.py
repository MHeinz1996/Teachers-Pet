from django.shortcuts import render, get_object_or_404, HttpResponseRedirect, redirect
from django.http import HttpRequest
from django.template import RequestContext
from django.contrib.auth.decorators import login_required
from django.contrib.auth.models import User
from datetime import datetime
import datetime
from django.contrib import messages
from django.db import connection
from django.db.models import Q


from .models import CourseAssignment
from .models import CourseStudent
from .models import CourseSchedule
from .models import LookupTerm
from .models import LookupCourse
from .models import Assignment_withGrade
from .forms import LookupTermForm
from .forms import CourseAssignmentForm


def homepage(request):
    return render(request, 'homepage.html')

#@login_required # Decorator that checks to see if a user is logged in before
#allowing them to access these views

# listing of user's current classes
@login_required
def student1_1(request):
    #get course_student table, filter on current user,  term end >= today, termstart <= today
    course_student=CourseStudent.objects.filter(student=request.user,course__term__termend__gte=datetime.date.today(),course__term__termstart__lte=datetime.date.today())
    #get user table for current user
    user_stats=User.objects.filter(username=request.user)
    #parameters to pass to template: screen type is Current, Show grades= yes because this is a student's own list of courses
    screen_type='Current'
    show_grade=1
    # Create context to pass to template
    context = {
        'course_student': course_student,  'user_stats':user_stats,'screen_type':screen_type, show_grade:show_grade
    }
    #Render template
    return render(request, 'student.html', context)

# listing of user's future classes
@login_required
def student1_2(request):
    #get course_student table, filter on current user, term start > today
    course_student=CourseStudent.objects.filter(student=request.user,course__term__termstart__gt=datetime.date.today())
    #get user table for current user
    user_stats=User.objects.filter(username=request.user)
    #parameters to pass to template: screen type is Future, Show grades= no because courses haven't started yet
    screen_type='Future'
    show_grade=0
    # Create context to pass to template
    context = {
        'course_student': course_student,  'user_stats':user_stats,'screen_type':screen_type,show_grade:show_grade
    }
    #Render template
    return render(request, 'student.html', context)

#listing of student's completed classes
@login_required
def student1_3(request):
    #get course_student table, filter on current user, term end < today
    course_student=CourseStudent.objects.filter(student=request.user,course__term__termend__lt=datetime.date.today())
    #get user table for current user
    user_stats=User.objects.filter(username=request.user)
    #parameters to pass to template: screen type is Future, Show grades= yes because this is a student's own list of courses
    screen_type='Completed'
    show_grade=1
    # Create context to pass to template
    context = {
        'course_student': course_student,  'user_stats':user_stats,'screen_type':screen_type,show_grade:show_grade
    }
   #Render template
    return render(request, 'student.html', context)

@login_required
# listing of teacher's current classes
def teacher1_1(request):
    course_teacher=CourseSchedule.objects.filter(teacher=request.user,term__termend__gte=datetime.date.today(),term__termstart__lte=datetime.date.today())
    user_stats=User.objects.filter(username=request.user)
    screen_type='Current'
    context = {
        'course_teacher': course_teacher, 'user_stats':user_stats, 'screen_type':screen_type
    }
    return render(request, 'teacher.html', context)

#listing of teacher's future classes
@login_required
def teacher1_2(request):

    course_teacher=CourseSchedule.objects.filter(teacher=request.user,term__termstart__gt=datetime.date.today())
    user_stats=User.objects.filter(username=request.user)
    screen_type='Upcoming'
    context = {
        'course_teacher': course_teacher, 'user_stats':user_stats, 'screen_type':screen_type
    }
    return render(request, 'teacher.html', context)

#listing of teacher's completed classes
@login_required
def teacher1_3(request):
    course_teacher=CourseSchedule.objects.filter(teacher=request.user,term__termend__lt=datetime.date.today())
    user_stats=User.objects.filter(username=request.user)
    screen_type='Completed'
    context = {
        'course_teacher': course_teacher, 'user_stats':user_stats, 'screen_type':screen_type
    }
    return render(request, 'teacher.html', context)


# listing of students assigned to a class (linked to from course listing screens (admin and teacher)
def course_roster(request,pk):
    course_schedule= get_object_or_404(CourseSchedule,pk=pk)
    course_student=CourseStudent.objects.filter(course=pk)
    context={'course_schedule': course_schedule, 'course_student':course_student,'pk':pk}
    return render(request, 'course_roster.html',context )

# listing of all scheduled courses for the current term
def admin1_1(request):
    all_courses=CourseSchedule.objects.filter(term__termend__gte=datetime.date.today(),term__termstart__lte=datetime.date.today())
    screen_type='Current'

    #filters
    course_query = request.GET.get('search')
    if course_query != '' and course_query is not None:
        all_courses = all_courses.filter(course__coursename__icontains = course_query)  
        
    context = {
        'all_courses': all_courses, 'screen_type':screen_type
    }
    return render(request, 'admin_courses.html', context)

# listing of all future scheduled courses
def admin1_2(request):
    all_courses=CourseSchedule.objects.filter(term__termstart__gt=datetime.date.today())
    screen_type='Upcoming'

    #filters
    course_query = request.GET.get('search')
    if course_query != '' and course_query is not None:
        all_courses = all_courses.filter(course__coursename__icontains = course_query)    

    context = {
        'all_courses': all_courses, 'screen_type':screen_type
    }
    return render(request, 'admin_courses.html', context)


# listing of all completed scheduled courses
def admin1_3(request):
    all_courses=CourseSchedule.objects.filter(term__termend__lt=datetime.date.today())
    screen_type='Completed'

    #filters
    course_query = request.GET.get('search')
    if course_query != '' and course_query is not None:
        all_courses = all_courses.filter(course__coursename__icontains = course_query)  

    context = {
        'all_courses': all_courses, 'screen_type':screen_type
    }
    return render(request, 'admin_courses.html', context)

  

# Create a new record in terms lookup table  
def create_term(request):
    # dictionary for initial data with 
    # field names as keys
    context ={}
  
    # add the dictionary during initialization
    form = LookupTermForm(request.POST or None)
    if form.is_valid():
        form.save()
        return HttpResponseRedirect("/list_term")  
    context['form']= form
    context['model']="Term"
    return render(request, "create_view.html", context)

# list all records in terms lookup table
def list_term(request):

    # dictionary for initial data with 
    # field names as keys
    context ={}
  
    # add the dictionary during initialization
    context["dataset"] = LookupTerm.objects.all()
    context["model"]="Term"
    context["title"]="Term name"
    context["description"]="Date range"
          
    return render(request, "list_view.html", context)


# delete a record in terms lookup table
def delete_term(request, pk):
    # dictionary for initial data with 
    # field names as keys
    context ={}
  
    # fetch the object related to passed id
    obj = get_object_or_404(LookupTerm, pk = pk)
  
  
    if request.method =="POST":
        # delete object
        try:
            obj.delete()
           
        except Exception as e:
            messages.error(request, "Deletion of this term is not allowed.")
         # after deleting redirect to 
            # home page
        return HttpResponseRedirect("/list_term")
        
  
    return render(request, "delete_view.html", context)

#  View a record in the terms lookup table
def detail_term(request, pk):
    # dictionary for initial data with 
    # field names as keys
    context ={}
   
    # add the dictionary during initialization
    context["data"] = LookupTerm.objects.get(pk = pk)
    context["model"]="Term"
    context["title"]="Term name"
    context["description"]="Date range"
    return render(request, "detail_view.html", context)

# Update a record in the terms lookup table
def update_term(request, pk):

    # dictionary for initial data with 
    # field names as keys
    context ={}
  
    # fetch the object related to passed id
    obj = get_object_or_404(LookupTerm, pk = pk)
  
    # pass the object as instance in form
    form = LookupTermForm(request.POST or None, instance = obj)
  
    # save the data from the form and
    # redirect to list_view
    if form.is_valid():
        form.save()
        return HttpResponseRedirect("/list_term")
  
    # add form dictionary to context
    context["form"] = form
    context['model']="Term"   
    return render(request, "update_view.html", context)


# List the assignments/submissions for a scheduled course and student
def student_assignment(request,pk,student):
    course_schedule= get_object_or_404(CourseSchedule,pk=pk)
    cursor=connection.cursor()
    user_stats=User.objects.filter(username=student) 
    q = "Call Assignment_withGrade('" + str(student) + "'," + str(pk)+ ")"
    cursor.execute(q)
    course_assignment=cursor.fetchall()
    context={'course_schedule': course_schedule, 'course_assignment':course_assignment,'user_stats':user_stats,'student':student}

    form = CourseAssignmentForm(request.POST or None)
    if form.is_valid():
        form.save() # Error stating: (1048, "Column 'course_schedule_id' cannot be null")
        return HttpResponseRedirect("/student_assignment")  
    context['form']= form
    context['model']="Assignment"

    return render(request, 'student_assignment.html',context )

# create a new assignment for a scheduled course
def create_assignment(request, pk):
    # dictionary for initial data with 
    # field names as keys
    context ={'pk': pk}
  
    # add the dictionary during initialization
    form = CourseAssignmentForm(request.POST or None)
    if form.is_valid():
        form.save() # Error stating: (1048, "Column 'course_schedule_id' cannot be null")
        return HttpResponseRedirect("/list_course_assignment")  
    context['form']= form
    context['model']="Assignment"
    return render(request, "create_view.html", context)

def list_course_assignment(request, pk):
    course_schedule= get_object_or_404(CourseSchedule,pk=pk)
    course_assignment=CourseAssignment.objects.filter(course_schedule=pk)

    context={'course_schedule': course_schedule, 'course_assignment': course_assignment, 'pk':pk}
          
    return render(request, "list_course_assignment.html", context)

def delete_assignment(request, pk):
    # dictionary for initial data with 
    # field names as keys
    context ={}
  
    # fetch the object related to passed id
    obj = get_object_or_404(CourseAssignment, pk = pk)
  
  
    if request.method =="POST":
        # delete object
        try:
            obj.delete()
           
        except Exception as e:
            messages.error(request, "Deletion of this term is not allowed.")
         # after deleting redirect to 
            # home page
        return HttpResponseRedirect("/list_course_assignment", pk) # Form saves deletion, having issues with redirecting back to page passing pk arg
        
  
    return render(request, "delete_view.html", context)

def update_assignment(request, pk):

    # dictionary for initial data with 
    # field names as keys
    context ={'pk':pk}
  
    # fetch the object related to passed id
    obj = get_object_or_404(CourseAssignment, pk = pk)
  
    # pass the object as instance in form
    form = CourseAssignmentForm(request.POST or None, instance = obj)
  
    # save the data from the form and
    # redirect to list_view
    if form.is_valid():
        form.save()
        return HttpResponseRedirect("/list_course_assignment", pk) # Form saves update, having issues with redirecting back to page passing pk arg
  
    # add form dictionary to context
    context["form"] = form
    context['model']="Assignment"   
    return render(request, "update_view.html", context)