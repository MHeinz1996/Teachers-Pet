from django.shortcuts import render
from django.http import HttpRequest
from django.template import RequestContext
from django.contrib.auth.decorators import login_required
from django.contrib.auth.models import User
from datetime import datetime
import datetime
from .models import DummyClass
from .models import DummyData


 


username=User.username

dummyclass=DummyClass.objects.all()
dummy_data=DummyData.objects.all()
#dummy_data=DummyData.objects.filter(student=username)



#dummy_data = [ 
#    {
#        'dept' : 'Math',
#        'teacher': 'Prof John Doe',
#        'class': 'Algebra 1',
#        'content': 'A+',
#    },
#    {
#        'dept' : 'English',
#        'teacher': 'Prof Jane Doe',
#        'class': 'English 101',
#        'content': 'A-',
#    }
#]

newitem = 'hello'

#dummyclass = [
#    {
#        'datestart' : datetime.date(2021, 1, 1),
#        'dateend' : datetime.date(2021, 3, 4),
#        'firstname' : 'steve',
#        'lastname' : 'kollar',
#        'studentid' : 28283921,
#        'classid' : 1112332123,
#        'class' : 'Math Intro',
#        'classid2' : 'CS283',
#        'grades' : [100, 70, 40, 100, 4, 28],
#        'assignments' : [100, 100, 100, 100, 100, 100, 100, 100, 100, 100]
#
#    },
#    {
#       'datestart' : datetime.date(2021, 1, 1),
#       'dateend' : datetime.date(2021, 3, 4),
#       'firstname' : 'steve',
#       'lastname' : 'kollar',
#       'studentid' : 28283921,
#       'classid' : 1112332123,
#       'class' : 'Math Intro',
#       'classid2' : 'CS283',

    }
]

completed_dummy = [
    {
        'datestart' : datetime.date(2020, 1, 1),
        'dateend' : datetime.date(2020, 3, 4),
        'dept' : 'History',
        'teacher' : 'Prof John Smith',
        'class' : 'US History I',
        'final' : '340/400',
        'final_percent' : '85%',
        'letter_grade' : 'B'
    },
    {
        'datestart' : datetime.date(2020, 1, 1),
        'dateend' : datetime.date(2020, 3, 4),
        'dept' : 'Science',
        'teacher' : 'Prof Jane Smith',
        'class' : 'Chemistry',
        'final' : '400/400',
        'final_percent' : '100%',
        'letter_grade' : 'A+'
    }
    
]


def homepage(request):
    return render(request, 'app/homepage.html')

def classes(request):
    context = {
        'dummy_data': dummy_data    # uses dummy data specified above for student1_1 view until we can replace with DB data
    }
    return render(request, 'classes/classes.html', context)  # context argument allows dummy data above to be used

#@login_required    # Decorator that checks to see if a user is logged in before allowing them to access these views
def student1_1(request):

    context = {
        'dummy_data': dummy_data    # uses dummy data specified above for student1_1 view until we can replace with DB data
    }
    return render(request, 'classes/student1_1.html', context)  # context argument allows dummy data above to be used

def teacher1_1(request):
    context = {
        'dummy_data': dummy_data    # uses dummy data specified above for teacher1_1 view until we can replace with DB data
    }
    return render(request, 'classes/teacher1_1.html', context)  # context argument allows dummy data above to be used

def admin1_1(request):
    context = {
        'dummy_data': dummy_data    # uses dummy data specified above for admin1_1 view until we can replace with DB data
    }
    return render(request, 'classes/admin1_1.html', context)  # context argument allows dummy data above to be used

def roster(request):
    context = {
        'roster' : dummyclass
    }
    return render(request, 'classes/roster.html', context)

def student1_3(request):
    context = {
        'completed_dummy': completed_dummy    # uses dummy data specified above for student1_1 view until we can replace with DB data
    }
    return render(request, 'classes/student1_3.html', context)  # context argument allows dummy data above to be used

def teacher1_3(request):
    context = {
        'completed_dummy': completed_dummy    # uses dummy data specified above for teacher1_1 view until we can replace with DB data
    }
    return render(request, 'classes/teacher1_3.html', context)  # context argument allows dummy data above to be used

def admin1_3(request):
    context = {
        'completed_dummy': completed_dummy    # uses dummy data specified above for admin1_1 view until we can replace with DB data
    }
    return render(request, 'classes/admin1_3.html', context)  # context argument allows dummy data above to be used