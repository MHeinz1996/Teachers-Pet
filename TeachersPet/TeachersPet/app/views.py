from django.shortcuts import render
from django.http import HttpRequest
from django.template import RequestContext
from datetime import datetime

dummy_data = [ 
    {
        'teacher': 'Prof John Doe',
        'class': 'Class 1',
        'content': 'A+',
    },
    {
        'teacher': 'Prof Jane Doe',
        'class': 'Class 2',
        'content': 'A-',
    }
]

def homepage(request):
    return render(request, 'app/homepage.html')

def student1_1(request):
    context = {
        'dummy_data': dummy_data    # uses dummy data specified above for student1_1 view until we can replace with DB data
    }
    return render(request, 'app/student1_1.html', context)  # context argument allows dummy data above to be used