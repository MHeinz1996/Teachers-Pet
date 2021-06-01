from django.shortcuts import redirect, render, get_object_or_404,HttpResponseRedirect
from django.contrib.auth.forms import UserCreationForm
from django.contrib import messages
from django.contrib.auth.models import User
from .forms import UserRegisterForm
from django.contrib.auth import get_user_model

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
    f = CustomUserUpdateForm(request.POST or None, instance = obj)
    # get the user's group memberships
    g = request.user.groups.all()
    # save the data from the form and
    # redirect to list_view
    if f.is_valid():
        f.save()
        messages.success(request, 'Account updated successfully')
        return HttpResponseRedirect("user_update")
   
    # add form dictionary to context
    context={'form': f,'groups':g}
    return render(request, "user_update.html",context)



User = get_user_model()


#list all users
def user_list(request):
    # dictionary for initial data with 
    # field names as keys
    #all_users= User.objects.values()
    
    
    User = get_user_model()
    all_users = User.objects.all()
    context= {'all_users': all_users}
    return render(request, "user_list.html", context)



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

