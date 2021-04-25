from django.shortcuts import render, get_object_or_404
from django.http import HttpRequest
from django.template import RequestContext
from django.contrib.auth.decorators import login_required
from django.contrib.auth.models import User
from datetime import datetime
import datetime

from .models import CourseStudent
from .models import CourseSchedule
from .models import LookupTerm

from .forms import LookupTermForm

def homepage(request):
    return render(request, 'homepage.html')

#@login_required # Decorator that checks to see if a user is logged in before
#allowing them to access these views

# listing of user's current classes
@login_required
def student1_1(request):
   
    course_student=CourseStudent.objects.filter(student=request.user,course__term__termend__gte=datetime.date.today(),course__term__termstart__lte=datetime.date.today())
    user_stats=User.objects.filter(username=request.user)
    screen_type='Current'
    show_grade=1
    context = {
        'course_student': course_student,  'user_stats':user_stats,'screen_type':screen_type, show_grade:show_grade
    }
    return render(request, 'student.html', context)

# listing of user's future classes
@login_required
def student1_2(request):
    course_student=CourseStudent.objects.filter(student=request.user,course__term__termstart__gt=datetime.date.today())
    #course_student=CourseStudent.objects.filter(student=request.user,course__term__term_status__contains='FU')
    user_stats=User.objects.filter(username=request.user)
    screen_type='Future'
    show_grade=0
    context = {
        'course_student': course_student,  'user_stats':user_stats,'screen_type':screen_type,show_grade:show_grade
    }
    return render(request, 'student.html', context)

#listing of student's completed classes

@login_required
def student1_3(request):
    course_student=CourseStudent.objects.filter(student=request.user,course__term__termend__lt=datetime.date.today())
    user_stats=User.objects.filter(username=request.user)
    screen_type='Completed'
    show_grade=1
    context = {
        'course_student': course_student,  'user_stats':user_stats,'screen_type':screen_type,show_grade:show_grade
    }
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
    course_student=CourseStudent.objects.filter(course__id__contains=pk)
    
    context={'course_schedule': course_schedule, 'course_student':course_student}
    return render(request, 'course_roster.html',context )

def admin1_1(request):
    all_courses=CourseSchedule.objects.filter(term__termend__gte=datetime.date.today(),term__termstart__lte=datetime.date.today())
    screen_type='Current'
    context = {
        'all_courses': all_courses, 'screen_type':screen_type
    }
    return render(request, 'admin_courses.html', context)

def admin1_2(request):
    all_courses=CourseSchedule.objects.filter(term__termstart__gt=datetime.date.today())
    screen_type='Upcoming'
    context = {
        'all_courses': all_courses, 'screen_type':screen_type
    }
    return render(request, 'admin_courses.html', context)

def admin1_3(request):
    all_courses=CourseSchedule.objects.filter(term__termend__lt=datetime.date.today())
    screen_type='Completed'
    context = {
        'all_courses': all_courses, 'screen_type':screen_type
    }
    return render(request, 'admin_courses.html', context)

  
# Lookups lists and detail views
  
def create_term(request):
    # dictionary for initial data with 
    # field names as keys
    context ={}
  
    # add the dictionary during initialization
    form = LookupTermForm(request.POST or None)
    if form.is_valid():
        form.save()
          
    context['form']= form
    context['model']="Term"
    return render(request, "create_view.html", context)

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


# delete view for details
def delete_term(request, pk):
    # dictionary for initial data with 
    # field names as keys
    context ={}
  
    # fetch the object related to passed id
    obj = get_object_or_404(LookupTerm, pk = pk)
  
  
    if request.method =="POST":
        # delete object
        obj.delete()
        # after deleting redirect to 
        # home page
        return HttpResponseRedirect("/")
  
    return render(request, "delete_view.html", context)

# after updating it will redirect to detail_View
def detail_term(request, pk):
    # dictionary for initial data with 
    # field names as keys
    context ={}
   
    # add the dictionary during initialization
    context["data"] = LookupTerm.objects.get(pk = pk)
    context["model"]="Term"
    return render(request, "detail_view.html", context)

# update view for details
def update_term(request, pk):

    # dictionary for initial data with 
    # field names as keys
    context ={}
  
    # fetch the object related to passed id
    obj = get_object_or_404(LookupTerm, pk = pk)
  
    # pass the object as instance in form
    form = LookupTermForm(request.POST or None)
  
    # save the data from the form and
    # redirect to detail_view
    if form.is_valid():
        form.save()
        return HttpResponseRedirect("/"+pk)
  
    # add form dictionary to context
    context["form"] = form
    context['model']="Term"   
    return render(request, "update_view.html", context)