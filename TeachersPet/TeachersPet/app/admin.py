#app/admin.py

from django.contrib import admin

from .models import LookupDepartment
from .models import CourseAssignment
from .models import CourseSchedule
from .models import User
from .models import CourseStudent
from .models import LookupCourse
from .models import LookupTerm
from .models import StudentSubmission
from .models import TeacherCertification




                                                                                                                                                                                                                                                                 











         
admin.site.register(LookupDepartment)
admin.site.register(CourseAssignment)
admin.site.register(CourseSchedule)
admin.site.register(CourseStudent)
admin.site.register(LookupCourse)
admin.site.register(LookupTerm)
admin.site.register(StudentSubmission)
admin.site.register(TeacherCertification)
