from django.shortcuts import redirect, render, get_object_or_404,HttpResponseRedirect
from django.contrib.auth.forms import UserCreationForm
from django.contrib import messages
from django.contrib.auth.models import User
from .forms import UserRegisterForm

from .forms import CustomUserCreationForm, CustomUserUpdateForm


def user_create(request):
    if request.method == 'POST':
        f = CustomUserCreationForm(request.POST)
        if f.is_valid():
            f.save()
            messages.success(request, 'Account created successfully')
            return redirect('user_create')

    else:
        f = CustomUserCreationForm()

    return render(request, 'user_create.html', {'form': f})


def user_update(request,pk):
    # dictionary for initial data with 
    # field names as keys
    context ={}
  
    # fetch the object related to passed id
    obj = get_object_or_404(User, pk = pk)
  
    # pass the object as instance in form
    form = CustomUserUpdateForm(request.POST or None, instance = obj)
  
    # save the data from the form and
    # redirect to list_view
    if form.is_valid():
        form.save()
        return HttpResponseRedirect("user_update")
  
    # add form dictionary to context
    return render(request, "user_update.html")



def register(request):
    if request.method == 'POST': 
        form = UserRegisterForm(request.POST)
        if form.is_valid():
            form.save()
            username = form.cleaned_data.get('username')
            messages.success(request, f'Account created for {username}!')
            return redirect('login')
    else:
        form = UserRegisterForm()
    return render(request, 'register.html', {'form': form})

