from django.shortcuts import render, get_object_or_404
from django.http import HttpRequest
from django.template import RequestContext
from django.contrib.auth.decorators import login_required
from django.contrib.auth.models import User
from datetime import datetime
import datetime
from .models import DummyClass
from .models import DummyData
from .models import CourseStudent
from .models import CourseSchedule
from .models import LookupTerm

 


dummy_class = DummyClass.objects.all()
dummy_data = DummyData.objects.all()


def homepage(request):
    return render(request, 'homepage.html')

def classes(request):
    context = {
        'dummy_data': dummy_data    # uses dummy data specified above for student1_1 view until we can replace
                                    # with DB data
    }
    return render(request, 'classes.html', context)  # context argument allows dummy data above to be used

#@login_required # Decorator that checks to see if a user is logged in before
#allowing them to access these views

# listing of user's current classes
@login_required

def student1_1(request):
   
    course_student=CourseStudent.objects.filter(student=request.user,course__term__term_status__contains='CU')
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
    
    course_student=CourseStudent.objects.filter(student=request.user,course__term__term_status__contains='FU')
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
   
    course_student=CourseStudent.objects.filter(student=request.user,course__term__term_status__contains='CM')
    user_stats=User.objects.filter(username=request.user)
    screen_type='Completed'
    show_grade=1
    context = {
        'course_student': course_student,  'user_stats':user_stats,'screen_type':screen_type,show_grade:show_grade
    }
    return render(request, 'student.html', context)

# listing of teacher's current classes
def teacher1_1(request):
    course_teacher=CourseSchedule.objects.filter(teacher=request.user,term__term_status__contains='CU')
    user_stats=User.objects.filter(username=request.user)
    screen_type='Current'
    context = {
        'course_teacher': course_teacher, 'user_stats':user_stats, 'screen_type':screen_type
    }
    return render(request, 'teacher.html', context)

#listing of teacher's future classes
def teacher1_2(request):
    course_teacher=CourseSchedule.objects.filter(teacher=request.user,term__term_status__contains='FU')
    user_stats=User.objects.filter(username=request.user)
    screen_type='Upcoming'
    context = {
        'course_teacher': course_teacher, 'user_stats':user_stats, 'screen_type':screen_type
    }
    return render(request, 'teacher.html', context)

#listing of teacher's completed classes
def teacher1_3(request):
    course_teacher=CourseSchedule.objects.filter(teacher=request.user,term__term_status__contains='CM')
    user_stats=User.objects.filter(username=request.user)
    screen_type='Completed'
    context = {
        'course_teacher': course_teacher, 'user_stats':user_stats, 'screen_type':screen_type
    }
    return render(request, 'teacher.html', context)


# listing of students assigned to a class
def course_roster(request,pk):
    course_schedule= get_object_or_404(CourseSchedule,pk=pk)
    course_student=CourseStudent.objects.filter(course__id__contains=pk)
    
    context={'course_schedule': course_schedule, 'course_student':course_student}
    return render(request, 'course_roster.html',context )

def admin1_1(request):
    all_courses=CourseSchedule.objects.filter(term__term_status__contains='CU')
    screen_type='Current'
    context = {
        'all_courses': all_courses, 'screen_type':screen_type
    }
    return render(request, 'admin_courses.html', context)

def admin1_2(request):
    all_courses=CourseSchedule.objects.filter(term__term_status__contains='FU')
    screen_type='Upcoming'
    context = {
        'all_courses': all_courses, 'screen_type':screen_type
    }
    return render(request, 'admin_courses.html', context)

def admin1_3(request):
    all_courses=CourseSchedule.objects.filter(term__term_status__contains='CM')
    screen_type='Completed'
    context = {
        'all_courses': all_courses, 'screen_type':screen_type
    }
    return render(request, 'admin_courses.html', context)
