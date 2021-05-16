from django import forms
from django.contrib.auth.models import User, Group
from django.contrib.auth.models import Permission
from django.contrib.auth.forms import UserCreationForm
from django.forms.widgets import PasswordInput, TextInput, EmailInput
from django.core.exceptions import ValidationError
from django.core.exceptions import ValidationError

GROUP_CHOICES = [('', ' '),
    ('TP_Admins', 'Admins'),
    ('Teachers','Teachers')]

class CustomUserCreationForm(forms.Form):
    username = forms.CharField(label='User name', min_length=4, max_length=150,required=True)
    email = forms.EmailField(label='Email address',required=True)
    first_name = forms.CharField(label='First name', required=True)
    last_name = forms.CharField(label='Last name',required=True)
    password1 = forms.CharField(widget=PasswordInput(attrs={'class':'validate','id': 'icon_prefix', 'type': 'password'}),label='Enter password')
    password2 = forms.CharField(widget=PasswordInput(attrs={'class':'validate','id': 'icon_prefix', 'type': 'password'}),label='Confirm password')
    group=forms.ChoiceField(choices=GROUP_CHOICES)


    def clean_username(self):
        username = self.cleaned_data['username'].lower()
        r = User.objects.filter(username=username)
        if r.count():
            raise  ValidationError("Username already exists")
        return username

    def clean_email(self):
        email = self.cleaned_data['email'].lower()
        r = User.objects.filter(email=email)
        if r.count():
            raise  ValidationError("Email already exists")
        return email

    def clean_password2(self):
        password1 = self.cleaned_data.get('password1')
        password2 = self.cleaned_data.get('password2')

        if password1 and password2 and password1 != password2:
            raise ValidationError("Passwords don't match")

        return password2

    def save(self, commit=True):
        user = User.objects.create_user(
            self.cleaned_data['username'],
            first_name=self.cleaned_data['first_name'],
            last_name=self.cleaned_data['last_name'],
            email=self.cleaned_data['email'],
            password=self.cleaned_data['password1']
                   )
        group=self.cleaned_data['group']
        usergroup = Group.objects.get(name=group)
        user.groups.add(usergroup)   # new_group as object and user is added
        return user


class CustomUserUpdateForm(forms.Form):
    class Meta:
        model=User
        fields=['username', 'email']



class UserRegisterForm(UserCreationForm):
    email = forms.EmailField()

    class Meta:
        model = User
        fields = ['username', 'email', 'password1', 'password2']

