from django.shortcuts import render
from django.http import HttpRequest
from django.template import RequestContext
from datetime import datetime
import datetime

dummy_data = [ 
    {
        'dept' : 'Math',
        'teacher': 'Prof John Doe',
        'class': 'Algebra 1',
        'content': 'A+',
    },
    {
        'dept' : 'English',
        'teacher': 'Prof Jane Doe',
        'class': 'English 101',
        'content': 'A-',
    }
]

newitem = 'hello'

dummyclass = [
    {
        'datestart' : datetime.date(2021, 1, 1),
        'dateend' : datetime.date(2021, 3, 4),
        'firstname' : 'steve',
        'lastname' : 'kollar',
        'studentid' : 28283921,
        'classid' : 1112332123,
        'class' : 'Math Intro',
        'classid2' : 'CS283',
        'grades' : [100, 70, 40, 100, 4, 28],
        'assignments' : [100, 100, 100, 100, 100, 100, 100, 100, 100, 100]

    },
    {
        'datestart' : datetime.date(2021, 1, 1),
        'dateend' : datetime.date(2021, 3, 4),
        'firstname' : 'steve',
        'lastname' : 'kollar',
        'studentid' : 28283921,
        'classid' : 1112332123,
        'class' : 'Math Intro',
        'classid2' : 'CS283',

    }
]


def homepage(request):
    return render(request, 'app/homepage.html')

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