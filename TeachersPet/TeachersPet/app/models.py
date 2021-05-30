
# app/models


from django.db import models
from django.contrib.auth.models import User

class FileUpload(models.Model):
    description = models.CharField(max_length=255, blank=True)
    submission = models.FileField(upload_to='documents/')
    uploaded_at = models.DateTimeField(auto_now_add=True)

  

class CourseAssignment(models.Model):
    id = models.BigAutoField(primary_key=True)
    assignmentdate = models.DateField(db_column='assignmentDate')  # Field name made lowercase.
    duedate = models.DateField(db_column='dueDate')  # Field name made lowercase.
    description = models.TextField()
    pointspossible = models.PositiveIntegerField(db_column='pointsPossible')  # Field name made lowercase.
    course_schedule = models.ForeignKey('CourseSchedule', models.DO_NOTHING)
    
    @property
    def title1(self):
        return self.description
    
    @property
    def title2(self):
        return self.assignmentdate

    def __str__(self):
        return self.course_schedule.term.term + ' ' + self.course_schedule.course.coursename + ' Due ' + str(self.duedate)


class CourseSchedule(models.Model):
    id = models.BigAutoField(primary_key=True)
    course = models.ForeignKey('LookupCourse', models.RESTRICT)
    teacher = models.ForeignKey(User,on_delete=models.RESTRICT,null=True)
    term = models.ForeignKey('LookupTerm', models.RESTRICT)
    
    def __str__(self):
        return self.term.term + ' ' + self.course.coursename

    
class CourseStudent(models.Model):
    id = models.BigAutoField(primary_key=True)
    grade = models.DecimalField(max_digits=10, decimal_places=0, blank=True, null=True)
    course = models.ForeignKey('CourseSchedule', models.RESTRICT)
    student = models.ForeignKey(User,on_delete=models.RESTRICT,null=True)

    def __str__(self):
        return self.course.term.term + ' - ' + self.course.course.coursename + ' - ' + self.student.username


class LookupCourse(models.Model):
    id = models.BigAutoField(primary_key=True)
    coursename = models.CharField(db_column='coursename', unique=True, max_length=50)
    coursecode = models.CharField(db_column='courseCode', max_length=15)  
    department = models.ForeignKey('LookupDepartment', models.RESTRICT, db_column='department', blank=True, null=True)
    
    @property
    def title1(self):
        return self.coursename
    @property
    def title2(self):
         return self.coursecode

    def __str__(self):
        return self.coursename



class LookupDepartment(models.Model):
    id = models.BigAutoField(primary_key=True)
    departmentname = models.CharField(db_column='departmentName', unique=True, max_length=50)  # Field name made lowercase.

    def __str__(self):
        return self.departmentname
    @property
    def title1(self):
        return self.departmentname


class LookupTerm(models.Model):
    id = models.BigAutoField(primary_key=True)
    term = models.CharField(max_length=50, unique=True)
    termstart = models.DateField(db_column='termStart')  
    termend = models.DateField(db_column='termEnd')  
    
    @property
    def title1(self):
        return self.term
    @property
    def title2(self):
         return "{} - {}".format(self.termstart, self.termend) 

    class Meta:
        unique_together=('termstart','termend',)
    def __str__(self):
        return self.term


class StudentSubmission(models.Model):
    id = models.BigAutoField(primary_key=True)
    dateuploaded = models.DateField(db_column='dateUploaded')  # Field name made lowercase.
    submission = models.CharField(max_length=100)
    pointsearned = models.PositiveIntegerField()
    teachernotes = models.TextField(db_column='teacherNotes')  # Field name made lowercase.
    assignment = models.ForeignKey(CourseAssignment, models.RESTRICT)
    student = models.ForeignKey(User,on_delete=models.RESTRICT,null=True)
    dategraded=models.DateField(db_column='dateGraded',null=True) 



class TeacherCertification(models.Model):
    id = models.BigAutoField(primary_key=True)
    certification = models.CharField(max_length=255)
    certdate = models.DateField(db_column='certDate')  # Field name made lowercase.
    expirationdate = models.DateField(db_column='expirationDate')  # Field name made lowercase.
    teacher = models.ForeignKey(User,on_delete=models.RESTRICT,null=True)

class Assignment_withGrade(models.Model):
    assignment_id=models.PositiveIntegerField()
    assignmentdate=models.DateField(db_column='assignmentDate')
    duedate = models.DateField(db_column='dueDate')  
    description = models.TextField()
    pointspossible = models.PositiveIntegerField(db_column='pointsPossible')
    course_schedule_id= models.PositiveIntegerField()
    pointsearned = models.PositiveIntegerField()
    numbergrade=models.DecimalField(max_digits=5, decimal_places=2)
    lettergrade=models.CharField(max_length=2)
    username=models.CharField(max_length=150)
    dategraded=models.DateField(db_column='dateGraded',null=True) 
    



######################################################################################################


    