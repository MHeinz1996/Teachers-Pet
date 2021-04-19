from django.shortcuts import render
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
    current_term=LookupTerm.objects.filter(term_status='CU')
    course_student=CourseStudent.objects.filter(student=request.user,course__term__term_status__contains='CU')
    user_stats=User.objects.filter(username=request.user)
    context = {
        'course_student': course_student, 'current_term':current_term, 'user_stats':user_stats
    }
    return render(request, 'student1_1.html', context)

# listing of user's future classes
@login_required
def student1_2(request):
    course_student=CourseStudent.objects.filter(student=request.user,course__term__term_status__contains='FU')
    user_stats=User.objects.filter(username=request.user)
    context = {
        'course_student': course_student,  'user_stats':user_stats
    }
    return render(request, 'student1_2.html', context)

#listing of user's completed classes
@login_required
def student1_3(request):
    course_student=CourseStudent.objects.filter(student=request.user,course__term__term_status__contains='CM')
    user_stats=User.objects.filter(username=request.user)
    context = {
        'course_student': course_student,  'user_stats':user_stats
    }
    return render(request, 'student1_3.html', context)

def teacher1_1(request):
    current_term=LookupTerm.objects.filter(term_status='CU')
    course_teacher=CourseSchedule.objects.filter(teacher=request.user,term__term_status__contains='CU')
    user_stats=User.objects.filter(username=request.user)
    context = {
        'course_teacher': course_teacher, 'current_term':current_term, 'user_stats':user_stats
    }
    return render(request, 'teacher1_1.html', context)


    #comment

def admin1_1(request):
    context = {
        'dummy_data': dummy_data    # uses dummy data specified above for admin1_1 view until we can replace
                                    # with DB data
    }
    return render(request, 'admin1_1.html', context)  # context argument allows dummy data above to be used

def roster(request):
    context = {
        'roster' : dummy_class
    }
    return render(request, 'roster.html', context)


def teacher1_3(request):
    context = {
        'dummy_data': dummy_data    # uses dummy data specified above for teacher1_1 view until we can replace
                                              # with DB data
    }
    return render(request, 'teacher1_3.html', context)  # context argument allows dummy data above to be used


def admin1_3(request):
    context = {
        'dummy_data': dummy_data    # uses dummy data specified above for admin1_1 view until we can replace
                                              # with DB data
    }
    return render(request, 'admin1_3.html', context)  # context argument allows dummy data above to be used