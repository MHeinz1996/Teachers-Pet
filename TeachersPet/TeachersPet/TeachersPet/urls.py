"""
Definition of urls for TeachersPet.
"""

from datetime import datetime
from django.urls import path, include
from django.contrib import admin
from django.contrib.auth import views as auth_views
from app import forms, views

from users import views as users_views


urlpatterns = [
    #**********************************************************************************
    # test file upload
    #**********************************************************************************
    path('file_upload', views.file_upload, name='file_upload'),



    #**********************************************************************************
    #Home page
    #**********************************************************************************
    path('', views.homepage, name='homepage'),
    #**********************************************************************************
    # Student listings
    #**********************************************************************************
    # List of currently enrolled courses for user
    path('student1_1', views.student1_1, name='student1_1'),
    # List of future enrolled courses for user
    path('student1_2', views.student1_2, name='student1_2'),
    # List of completed courses for user
    path('student1_3', views.student1_3, name='student1_3'),

    #**********************************************************************************
    # Teachers listings
    #**********************************************************************************

    # list of courses for teacher in current term
    path('teacher1_1', views.teacher1_1, name='teacher1_1'),
    # list of future courses for teacher
    path('teacher1_2', views.teacher1_2, name='teacher1_2'),
    # list of completed courses for teacher
    path('teacher1_3', views.teacher1_3, name='teacher1_3'),

    #**********************************************************************************
    # Course Schedule listings - all courses, not filtered by teacher or student
    #**********************************************************************************
    path('admin1_1', views.admin1_1, name='admin1_1'),
    path('admin1_2', views.admin1_2, name='admin1_2'),
    path('admin1_3', views.admin1_3, name='admin1_3'),
    path('create_course_schedule', views.create_course_schedule, name='create_course_schedule'),
    path('delete_course_schedule/<int:pk>', views.delete_course_schedule, name='delete_course_schedule'),
    path('update_course_schedule/<int:pk>', views.update_course_schedule, name='update_course_schedule'),
    #**********************************************************************************
    # Course Assignment screens (list, create, delete, update, view)
    #**********************************************************************************
    path('create_assignment/<int:parentkey>', views.create_assignment, name='create_assignment'),
    path('delete_assignment/<int:pk>/<int:parentkey>', views.delete_assignment, name='delete_assignment'),
    path('update_assignment/<int:pk>/<int:parentkey>', views.update_assignment, name='update_assignment'),  
    path('submit_assignment/<int:pk>/<int:parentkey>', views.submit_assignment, name='submit_assignment'),
    path('list_course_assignment/<int:pk>', views.list_course_assignment, name='list_course_assignment'),

    
    #**********************************************************************************
    # Lookup table screens (list, create, delete, update, view)
    #**********************************************************************************
    # Lookup_Terms table
    path('create_term', views.create_term, name='create_term'),
    path('list_term', views.list_term, name='list_term'),
    path('delete_term/<int:pk>', views.delete_term, name='delete_term'),
    path('update_term/<int:pk>', views.update_term, name='update_term'),
    path('detail_term/<int:pk>', views.detail_term, name='detail_term'),

    #**********************************************************************************
    # Student assignments - show all assignments for a scheduled course/student. Show
    # grades when available
    #**********************************************************************************
    path('student_assignment/<int:pk>/<str:student>', views.student_assignment, name='student_assignment'),


    #**********************************************************************************
    #User maintenance screens
    #**********************************************************************************

    path('register/', users_views.register, name='register'),
    path('users_list/', users_views.user_list, name='user_list'),
    path('user_create/', users_views.user_create, name='user_create'),
    path('user_update/<int:pk>', users_views.user_update, name='user_update'),
    path('login/', auth_views.LoginView.as_view(template_name='login.html'), name='login'),
    path('logout/', auth_views.LogoutView.as_view(template_name='logout.html'), name='logout'),
    path('admin/', admin.site.urls),
    
    #**********************************************************************************
    # Course roster - show all students in a scheduled course
    #**********************************************************************************
    path('course_roster/<int:pk>/', views.course_roster, name = 'course_roster'),   
    
]