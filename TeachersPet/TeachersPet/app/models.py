
# app/models


from django.db import models
from django.contrib.auth.models import User



# Create your models here.
class DummyClass(models.Model):
  id = models.BigAutoField(primary_key=True)
  datestart = models.DateField(db_column='dateStart')
  dateend = models.DateField(db_column='dateEnd')
  firstname = models.CharField(db_column='FirstName', unique=True, max_length=50) 
  lastname = models.CharField(db_column='LastName', unique=True, max_length=255) 
  studentid = models.CharField(db_column='StudentID', unique=True, max_length=14)
  classid = models.CharField(db_column='ClassID', unique=True, max_length=14)
  classname = models.CharField(db_column='Class', unique=True, max_length=100)
  classid2 = models.CharField(db_column='ClassID2', unique=True, max_length=100)
  grade = models.PositiveIntegerField(db_column='Grade')
  assignment = models.PositiveIntegerField(db_column='Assignment')

class DummyData(models.Model):
    id = models.BigAutoField(primary_key=True)
    dept = models.CharField(db_column='Dept', unique=False, max_length=14)
    teacher = models.CharField(db_column='Teacher', unique=False, max_length=255)
    className = models.CharField(db_column='ClassName', unique=False, max_length=100)
    content = models.CharField(db_column='Content', unique=False, max_length=100)
    student = models.ForeignKey(User,on_delete=models.RESTRICT,null=True)
    

class CourseAssignment(models.Model):
    id = models.BigAutoField(primary_key=True)
    assignmentdate = models.DateField(db_column='assignmentDate')  # Field name made lowercase.
    duedate = models.DateField(db_column='dueDate')  # Field name made lowercase.
    description = models.TextField()
    pointspossible = models.PositiveIntegerField(db_column='pointsPossible')  # Field name made lowercase.
    course_schedule = models.ForeignKey('CourseSchedule', models.DO_NOTHING)

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

    def __str__(self):
        return self.coursename



class LookupDepartment(models.Model):
    id = models.BigAutoField(primary_key=True)
    departmentname = models.CharField(db_column='departmentName', unique=True, max_length=50)  # Field name made lowercase.

    def __str__(self):
        return self.departmentname


class LookupTerm(models.Model):
    id = models.BigAutoField(primary_key=True)
    term = models.CharField(max_length=50)
    termstart = models.DateField(db_column='termStart')  # Field name made lowercase.
    termend = models.DateField(db_column='termEnd')  # Field name made lowercase.
    COMPLETED = 'CM'
    CURRENT = 'CU'
    FUTURE = 'FU'
    TERM_STATUS_CHOICES = [(COMPLETED, 'Completed'),
        (CURRENT, 'Current'),
        (FUTURE, 'Future'),]
    term_status = models.CharField(max_length=2,
        choices=TERM_STATUS_CHOICES,
        default=FUTURE,)

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




class TeacherCertification(models.Model):
    id = models.BigAutoField(primary_key=True)
    certification = models.CharField(max_length=255)
    certdate = models.DateField(db_column='certDate')  # Field name made lowercase.
    expirationdate = models.DateField(db_column='expirationDate')  # Field name made lowercase.
    teacher = models.ForeignKey(User,on_delete=models.RESTRICT,null=True)


######################################################################################################


    