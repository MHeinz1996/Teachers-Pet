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
    path('student1_2', views.student1_2, name='student1_2'),
    path('student1_3', views.student1_3, name='student1_3'),
    path('teacher1_1', views.teacher1_1, name='teacher1_1'),
    path('teacher1_2', views.teacher1_2, name='teacher1_2'),
    path('teacher1_3', views.teacher1_3, name='teacher1_3'),
    path('admin1_1', views.admin1_1, name='admin1_1'),
    path('admin1_2', views.admin1_2, name='admin1_2'),
    path('admin1_3', views.admin1_3, name='admin1_3'),
    path('create_term', views.create_term, name='create_term'),
    path('list_term', views.list_term, name='list_term'),
    path('delete_term/<int:pk>', views.delete_term, name='delete_term'),
    path('update_term/<int:pk>', views.update_term, name='update_term'),
    path('detail_term/<int:pk>', views.detail_term, name='detail_term'),
    path('register/', users_views.register, name='register'),
    path('login/', auth_views.LoginView.as_view(template_name='login.html'), name='login'),
    path('logout/', auth_views.LogoutView.as_view(template_name='logout.html'), name='logout'),
    path('admin/', admin.site.urls),
    
    path('course_roster/<int:pk>/', views.course_roster, name = 'course_roster')

]
