from django.shortcuts import render
from django.http import HttpRequest
from django.template import RequestContext
from datetime import datetime

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