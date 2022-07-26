"""
Definition of forms.
"""

from django import forms
from django.contrib.auth.forms import AuthenticationForm
from django.utils.translation import ugettext_lazy as _
from .models import CourseStudent, LookupTerm, CourseAssignment,CourseSchedule, StudentSubmission

#**********************************************************************************
# Student Submissions Forms
#**********************************************************************************
class UploadForm(forms.ModelForm):
    class Meta:
        model = StudentSubmission
        fields = ['submission']
        labels={'submission':''}



class StudentSubmissionForm(forms.ModelForm):
    class Meta:
        model = StudentSubmission
        
        fields = ["submission"]
        

class StudentSubmissionGradeForm(forms.ModelForm):
    class Meta:
        model = StudentSubmission
        fields = ["pointsearned","teachernotes"]


#**********************************************************************************
# user authentication
#**********************************************************************************
class BootstrapAuthenticationForm(AuthenticationForm):
    """Authentication form which uses boostrap CSS."""
    username = forms.CharField(max_length=254,
                               widget=forms.TextInput({
                                   'class': 'form-control',
                                   'placeholder': 'User name'}))
    password = forms.CharField(label=_("Password"),
                               widget=forms.PasswordInput({
                                   'class': 'form-control',
                                   'placeholder':'Password'}))

#**********************************************************************************
# Course Student form
#**********************************************************************************
class CourseStudentForm(forms.ModelForm):

    class Meta:
        model = CourseStudent
        fields = ('student', 'course')

#**********************************************************************************
# Course assignment
#**********************************************************************************
class CourseAssignmentForm(forms.ModelForm):
    class Meta:
        model=CourseAssignment
        fields=["description","assignmentdate","duedate", "pointspossible"]

#**********************************************************************************
# Course schedule
#**********************************************************************************
class CourseScheduleForm(forms.ModelForm):

    class Meta:
        model = CourseSchedule
        fields = ('course', 'teacher','term')
        

#**********************************************************************************
# Lookup table forms
#**********************************************************************************
class LookupTermForm(forms.ModelForm):
    class Meta:
        model=LookupTerm
        fields=["term","termstart","termend"]


