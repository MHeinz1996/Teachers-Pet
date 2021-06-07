from django.shortcuts import render, get_object_or_404, HttpResponseRedirect, redirect
from django.http import HttpRequest, HttpResponse
from django.template import RequestContext
from django.contrib.auth.decorators import login_required
from django.contrib.auth.models import User
from datetime import datetime
import datetime
from django.contrib import messages
from django.db import IntegrityError
from django.db import connection
from django.db.models import Q
from django.views.generic.edit import DeleteView



from .models import CourseAssignment
from .models import CourseStudent
from .models import CourseSchedule
from .models import LookupTerm
from .models import LookupCourse
from .models import Assignment_withGrade
from .models import CurrentTeacherCS_withCounts
from .models import StudentSubmission
from .models import FileUpload
from .forms import LookupTermForm
from .forms import CourseAssignmentForm
from .forms import CourseScheduleForm
from .forms import StudentSubmissionForm
from .forms import UploadForm

#Test file upload
def file_upload(request,pk):
    context ={'pk': pk}
    course_assignment= get_object_or_404(CourseAssignment,pk=pk)
    user_stats=User.objects.filter(username=request.user)
    if request.method == 'POST':
        form = UploadForm(request.POST, request.FILES)
        if form.is_valid():
            form.instance.assignment=course_assignment
            form.instance.student=user_stats
            form.save()
            return redirect('file_view')
    else:
        form = UploadForm()
    return render(request, 'file_upload.html', {
        'form': form
    })

def file_view(request):
    files = FileUpload.objects.all()
    return render(request, 'file_view.html', {
        'files': files
    })

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
    user_stats=User.objects.filter(username=request.user)
    teacher=request.user.id
    
    cursor=connection.cursor()
    q = "Call CurrentTeacherCS_withCounts(" + str(teacher) + ")"
    cursor.execute(q)
    course_teacher=cursor.fetchall()
    
    screen_type='Current'
    context = {
    'course_teacher': course_teacher, 'user_stats':user_stats, 'screen_type':screen_type,'teacher':teacher }
    return render(request, 'teacher.html', context)


#listing of teacher's future classes
@login_required
def teacher1_2(request):
    user_stats=User.objects.filter(username=request.user)
    teacher=request.user.id
    cursor=connection.cursor()
    q = "Call FutureTeacherCS_withCounts(" + str(teacher) + ")"
    cursor.execute(q)
    course_teacher=cursor.fetchall()
    
    screen_type='Future'
    context = {
    'course_teacher': course_teacher, 'user_stats':user_stats, 'screen_type':screen_type,'teacher':teacher }
    return render(request, 'teacher.html', context)
#listing of teacher's completed classes
@login_required
def teacher1_3(request):
    user_stats=User.objects.filter(username=request.user)
    teacher=request.user.id
    cursor=connection.cursor()
    q = "Call CompletedTeacherCS_withCounts(" + str(teacher) + ")"
    cursor.execute(q)
    course_teacher=cursor.fetchall()
    screen_type='Completed'
    context = {
    'course_teacher': course_teacher, 'user_stats':user_stats, 'screen_type':screen_type,'teacher':teacher }
    return render(request, 'teacher.html', context)


# listing of students assigned to a class (linked to from course listing screens (admin and teacher)
def course_roster(request,pk):
    course_schedule= get_object_or_404(CourseSchedule,pk=pk)
    #course_student=CourseStudent.objects.filter(course=pk)
    cursor=connection.cursor()
    q = "Call CourseStudentGrade(" + str(pk) + ")"
    cursor.execute(q)
    course_student=cursor.fetchall()

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

# Create a new record in course schedule table 
def create_course_schedule(request):
    # dictionary for initial data with 
    # field names as keys
    context ={}
  
    # add the dictionary during initialization
    form = CourseScheduleForm(request.POST or None)
    if form.is_valid():
        form.save()
        return HttpResponseRedirect("/admin1_1")  
    context['form']= form
    context['model']="CourseSchedule"
    return render(request, "create_view.html", context)


# delete a record in course schedule table
def delete_course_schedule(request, pk):
    # dictionary for initial data with 
    # field names as keys
    context ={}
  
    # fetch the object related to passed id
    obj = get_object_or_404(CourseSchedule, pk = pk)
  
  
    if request.method =="POST":
        # delete object
        try:
            obj.delete()
           
        except Exception as e:
            messages.error(request, "Deletion of this scheduled course is not allowed.")
         # after deleting redirect to 
            # home page
        return HttpResponseRedirect("/admin1_1")
        
  
    return render(request, "delete_view.html", context)

# Update a record in the terms lookup table
def update_course_schedule(request, pk):

    # dictionary for initial data with 
    # field names as keys
    context ={}
  
    # fetch the object related to passed id
    obj = get_object_or_404(CourseSchedule, pk = pk)
  
    # pass the object as instance in form
    form = CourseScheduleForm(request.POST or None, instance = obj)
  
    # save the data from the form and
    # redirect to list_view
    if form.is_valid():
        form.save()
        return HttpResponseRedirect("/admin1_1")
  
    # add form dictionary to context
    context["form"] = form
    context['model']="Course Schedule"   
    return render(request, "update_view.html", context)


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
    context["title1"]="Term name"
    context["title2"]="Date range"
          
    return render(request, "list_term.html", context)


def delete_term(request, pk):

     # dictionary for initial data with 
    # field names as keys
    context ={}

    # fetch the object related to passed id
    obj = get_object_or_404(LookupTerm, pk = pk)
    context["data"] = obj
    context["model"]="Term"
    context["title1"]="Term name"
    context["title2"]="Date range"

    if request.method =="POST":
        # delete object
        try:
            obj.delete()
        except Exception as e:
            messages.error(request, "There are courses scheduled for this term. Deletion is not allowed.")
            return render(request, "delete_view.html", context)
            
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
    context["title1"]="Term name"
    context["title2"]="Date range"
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
    context={'course_schedule': course_schedule, 'course_assignment':course_assignment,'user_stats':user_stats,'student':student, 'pk':pk}

    return render(request, 'student_assignment.html',context )

# create a new assignment for a scheduled course
def create_assignment(request, parentkey):
    # dictionary for initial data with 
    # field names as keys
    context ={'parentkey': parentkey}
    course_schedule= get_object_or_404(CourseSchedule,pk=parentkey)
    # add the dictionary during initialization
    form = CourseAssignmentForm(request.POST or None)
    if form.is_valid():
        form.instance.course_schedule=course_schedule
        form.save()
        return redirect('list_course_assignment', pk=parentkey)
    context['form']= form
    context['model']="Assignment"
    return render(request, "create_view.html", context)

def list_course_assignment(request, pk):
    course_schedule= get_object_or_404(CourseSchedule,pk=pk)
    course_assignment=CourseAssignment.objects.filter(course_schedule=pk)

    context={'course_schedule': course_schedule, 'course_assignment': course_assignment, 'pk':pk}
          
    return render(request, "list_course_assignment.html", context)

def delete_assignment(request, pk, parentkey):
    # dictionary for initial data with 
    # field names as keys
    context ={'pk':pk}
  
    # fetch the object related to passed id
    obj = get_object_or_404(CourseAssignment, pk = pk)
    context["data"] = obj
    context["model"]="Course Assignment"
    context["title1"]="Assignment"
    context["title2"]="Date assigned"
  
    if request.method =="POST":
        # delete object
        try:
            obj.delete()
           
        except Exception as e:
            messages.error(request, "Deletion of this assignment is not allowed.")
         
        return redirect('list_course_assignment', pk=parentkey)
        
  
    return render(request, "delete_view.html", context)

def update_assignment(request, pk, parentkey):

    # dictionary for initial data with 
    # field names as keys
    context ={'pk':pk,'parentkey':parentkey}
  
    # fetch the object related to passed id
    obj = get_object_or_404(CourseAssignment, pk = pk)
    
    #fetch the header record for the passed ID

    # pass the object as instance in form
    form = CourseAssignmentForm(request.POST or None, instance = obj)
  
    # save the data from the form and
    # redirect to list_view
    if form.is_valid():
        form.save()
        return redirect('list_course_assignment', pk=parentkey)

  
    # add form dictionary to context
    context["form"] = form
    context['model']="Assignment"   
    return render(request, "update_view.html", context)

