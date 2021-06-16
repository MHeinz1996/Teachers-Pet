
# app/models


from django.db import models
from django.contrib.auth.models import User



class CourseAssignment(models.Model):
    id = models.BigAutoField(primary_key=True)
    assignmentdate = models.DateField(db_column='assignmentDate',verbose_name=u'Assignment date')  # Field name made lowercase.
    duedate = models.DateField(db_column='dueDate',verbose_name=u'Due date')  # Field name made lowercase.
    description = models.TextField(verbose_name=u'Description')
    pointspossible = models.PositiveIntegerField(db_column='pointsPossible',verbose_name=u'Points')  # Field name made lowercase.
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
    course = models.ForeignKey('LookupCourse', models.RESTRICT,verbose_name=u'Course name')
    teacher = models.ForeignKey(User,on_delete=models.RESTRICT,null=True, verbose_name=u'Teacher')
    term = models.ForeignKey('LookupTerm', models.RESTRICT,verbose_name=u'Term')
    
    def __str__(self):
        return self.term.term + ' ' + self.course.coursename

    
class CourseStudent(models.Model):
    id = models.BigAutoField(primary_key=True)
    course = models.ForeignKey('CourseSchedule', models.RESTRICT,verbose_name=u'Course name')
    student = models.ForeignKey(User,on_delete=models.RESTRICT,null=True,verbose_name=u'Student')

    def __str__(self):
        return self.course.term.term + ' - ' + self.course.course.coursename + ' - ' + self.student.username


class LookupCourse(models.Model):
    id = models.BigAutoField(primary_key=True)
    coursename = models.CharField(db_column='coursename', unique=True, max_length=50,verbose_name=u'Course name')
    coursecode = models.CharField(db_column='courseCode', max_length=15,verbose_name=u'Course code')  
    department = models.ForeignKey('LookupDepartment', models.RESTRICT, db_column='department', blank=True, null=True,verbose_name=u'Department')
    
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
    dateuploaded = models.DateField(db_column='dateuploaded',verbose_name=u'Upload date', null=True)  # Field name made lowercase.
    submission = models.FileField(upload_to='documents/',verbose_name=u'Submission',blank=True)
    pointsearned = models.PositiveIntegerField(verbose_name=u'Points earned',null=True)
    teachernotes = models.TextField(db_column='teachernotes',verbose_name=u'Teacher notes', null=True)  # Field name made lowercase.
    assignment = models.ForeignKey(CourseAssignment, models.RESTRICT,verbose_name=u'Assignment description')
    student = models.ForeignKey(User,on_delete=models.RESTRICT,verbose_name=u'Student')
    dategraded=models.DateField(db_column='dateGraded',null=True,verbose_name=u'Date graded') 



class Assignment_withGrade(models.Model):
    assignment_id=models.PositiveIntegerField()
    assignmentdate=models.DateField(db_column='assignmentDate',verbose_name=u'Date assigned')
    duedate = models.DateField(db_column='dueDate')  
    description = models.TextField()
    pointspossible = models.PositiveIntegerField(db_column='pointsPossible')
    course_schedule_id= models.PositiveIntegerField()
    pointsearned = models.PositiveIntegerField()
    numbergrade=models.DecimalField(max_digits=5, decimal_places=2)
    lettergrade=models.CharField(max_length=2)
    username=models.CharField(max_length=150)
    dategraded=models.DateField(db_column='dateGraded',null=True) 
    
class CurrentTeacherCS_withCounts(models.Model):
    course_schedule_id=models.PositiveIntegerField()
    course_id=models.PositiveIntegerField()
    teacher_id=models.PositiveIntegerField()
    term = models.CharField(max_length=50, unique=True)
    termstart = models.DateField(db_column='termStart')  
    termend = models.DateField(db_column='termEnd')  
    coursename = models.CharField(db_column='coursename', unique=True, max_length=50)
    coursecode = models.CharField(db_column='courseCode', max_length=15)  
    first_name = models.CharField(db_column='Teacher first name',max_length=150)
    last_name=models.CharField(db_column='Teacher last name',max_length=150)
    roster_count =models.PositiveIntegerField()

class CompletedTeacherCS_withCounts(models.Model):
    course_schedule_id=models.PositiveIntegerField()
    course_id=models.PositiveIntegerField()
    teacher_id=models.PositiveIntegerField()
    term = models.CharField(max_length=50, unique=True)
    termstart = models.DateField(db_column='termStart')  
    termend = models.DateField(db_column='termEnd')  
    coursename = models.CharField(db_column='coursename', unique=True, max_length=50)
    coursecode = models.CharField(db_column='courseCode', max_length=15)  
    first_name = models.CharField(db_column='Teacher first name',max_length=150)
    last_name=models.CharField(db_column='Teacher last name',max_length=150)
    roster_count =models.PositiveIntegerField()

class FutureTeacherCS_withCounts(models.Model):
    course_schedule_id=models.PositiveIntegerField()
    course_id=models.PositiveIntegerField()
    teacher_id=models.PositiveIntegerField()
    term = models.CharField(max_length=50, unique=True)
    termstart = models.DateField(db_column='termStart')  
    termend = models.DateField(db_column='termEnd')  
    coursename = models.CharField(db_column='coursename', unique=True, max_length=50)
    coursecode = models.CharField(db_column='courseCode', max_length=15)  
    first_name = models.CharField(db_column='Teacher first name',max_length=150)
    last_name=models.CharField(db_column='Teacher last name',max_length=150)
    roster_count =models.PositiveIntegerField()

class ClassStudentGrade(models.Model):
    course_student_id = models.PositiveIntegerField()
    course_schedule_id=models.PositiveIntegerField()
    student_id=models.PositiveIntegerField()
    first_name = models.CharField(db_column='Student first name',max_length=150)
    last_name=models.CharField(db_column='Student last name',max_length=150)
    userid=models.PositiveIntegerField()
    username=models.CharField(max_length=150)
    coursegrade = models.DecimalField(max_digits=10, decimal_places=0, blank=True, null=True,verbose_name=u'Course grade')
    pointsEarned = models.DecimalField(max_digits=10, decimal_places=0, blank=True, null=True,verbose_name=u'Points earned')
    pointsPossible = models.DecimalField(max_digits=10, decimal_places=0, blank=True, null=True,verbose_name=u'Points possible')
    term = models.CharField(max_length=50)
    termstart = models.DateField(db_column='termStart')  
    termend = models.DateField(db_column='termEnd')  
    ####################################################################################################

   
class StudentCourseListWithGrade(models.Model):
    course_student_id = models.PositiveIntegerField()
    course_schedule_id=models.PositiveIntegerField()
    student_id=models.PositiveIntegerField()
    teacher = models.CharField(db_column='Teacher',max_length=150)
    coursegrade = models.DecimalField(max_digits=10, decimal_places=0, blank=True, null=True,verbose_name=u'Course grade')
    pointsEarned = models.DecimalField(max_digits=10, decimal_places=0, blank=True, null=True,verbose_name=u'Points earned')
    pointsPossible = models.DecimalField(max_digits=10, decimal_places=0, blank=True, null=True,verbose_name=u'Points possible')
    term = models.CharField(max_length=50)
    termstart = models.DateField(db_column='termStart')  
    termend = models.DateField(db_column='termEnd')  
    coursename = models.CharField(db_column='coursename', max_length=150, verbose_name=u'Course name')
    screen=models.CharField(db_column='screen',max_length=10, verbose_name=u'Screen')

    