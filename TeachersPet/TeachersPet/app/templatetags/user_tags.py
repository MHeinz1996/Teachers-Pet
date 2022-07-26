# Stdlib imports

# Core Django imports
from django import template

# Third-party app imports

# Relative imports of the 'app-name' package


register = template.Library()


@register.filter('has_group')
def has_group(user, group_name):
    
    groups = user.groups.all().values_list('name', flat=True)
    return True if group_name in groups else False

@register.filter('is_teacher')
def is_teacher(role):
    teacher='teacher'
    return True if role==teacher else False
    
  
