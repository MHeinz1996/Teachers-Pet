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
    #path('home/', views.home, name='home'),
    path('', views.homepage, name='homepage'),
    path('student1_1', views.student1_1, name='student1_1'),
    path('teacher1_1', views.teacher1_1, name='teacher1_1'),
    path('admin1_1', views.admin1_1, name='admin1_1'),
    path('student1_3', views.student1_3, name='student1_3'),
    path('teacher1_3', views.teacher1_3, name='teacher1_3'),
    path('admin1_3', views.admin1_3, name='admin1_3'),
    path('register/', users_views.register, name='register'),
    path('login/', auth_views.LoginView.as_view(template_name='users/login.html'), name='login'),
    path('logout/', auth_views.LogoutView.as_view(template_name='users/logout.html'), name='logout'),
    path('admin/', admin.site.urls),
    path('roster/', views.roster, name = 'roster')

]
