"""
Definition of forms.
"""

from django import forms
from django.contrib.auth.forms import AuthenticationForm
from django.utils.translation import ugettext_lazy as _
from .models import CourseStudent, LookupTerm


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


class CourseStudentForm(forms.ModelForm):

    class Meta:
        model = CourseStudent
        fields = ('student', 'course','grade')


class LookupTermForm(forms.ModelForm):
    class Meta:
        model=LookupTerm
        fields=["term","termstart","termend"]
