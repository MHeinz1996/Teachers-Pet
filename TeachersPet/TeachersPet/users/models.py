from django.db import models



class User(models.Model):
    firstName=models.CharField(max_length=100)
    lastName=models.CharField(max_length=100)
    middleName=models.CharField(max_length=100)
    UserID=models.CharField(max_length=6)
    SSN=models.PositiveIntegerField()
    ADMIN='AD'
    TEACHER='T'
    STUDENT='S'
    UserType_Choices=[
        (ADMIN,'Admin'),
        (TEACHER,'Teacher'),
        (STUDENT,'Student'),]
    userType=models.CharField(max_length=2,
        choices=UserType_Choices,default=STUDENT)
    address=models.TextField()
    city=models.CharField(max_length=100)
    state=models.CharField(max_length=2)
    zipCode=models.PositiveIntegerField()
    phone=models.PositiveIntegerField()
    lastLoginDate=models.DateField()
    GPA=models.DecimalField(max_digits=5,decimal_places=2,null=True)
 
    def __str__(self):
        return self.UserID


class CourseName(models.Model):
    courseName=models.CharField(max_length=50)
    courseCode=models.CharField(max_length=4)


    def __str__(self):
        return self.courseName
    
class Terms(models.Model):
    term=models.CharField(max_length=50)
    termStart=models.DateField()
    termEnd=models.DateField()
        


    def __str__(self):
        return self.term
    
class Course(models.Model):
    course=models.ForeignKey(CourseName,on_delete=models.RESTRICT)
    term=models.ForeignKey(Terms,on_delete=models.RESTRICT)
    teacher=models.ForeignKey(User,on_delete=models.RESTRICT,
                              limit_choices_to={'userType':'T'},null=True)
    term=models.ForeignKey(Terms,on_delete=models.RESTRICT)

   
    
    def __str__(self):
        return self.course
    
    
class CourseStudents(models.Model):
    course=models.ForeignKey(Course,on_delete=models.CASCADE)
    student=models.ForeignKey(User,on_delete=models.CASCADE,
                              limit_choices_to={'userType':'S'},)
    grade=models.DecimalField(max_digits=5,decimal_places=2,null=True)
    
    def __str__(self):
        return self.course


class TeacherCertifications(models.Model):
    teacher=models.ForeignKey(User,on_delete=models.CASCADE,
                              limit_choices_to={'userType':'T'},null=True)
    certification=models.CharField(max_length=255)
    certDate=models.DateField()
    expirationDate=models.DateField()

   
    
    def __str__(self):
        return self.certification
    
class Assignments(models.Model):
    course=models.ForeignKey(Course,on_delete=models.CASCADE)
    assignmentDate=models.DateField()
    dueDate=models.DateField()
    description=models.TextField() 
    pointsPossible=models.PositiveIntegerField()
    
    
class StudentAssignemnts(models.Model):
    assignment=models.ForeignKey(Assignments,on_delete=models.CASCADE)
    student=models.ForeignKey(User,on_delete=models.CASCADE,
                              limit_choices_to={'userType':'S'},)
    dateUploaded=models.DateField()
    submission=models.FileField()
    pointsEarned=models.PositiveIntegerField()
    teacherNotes=models.TextField()
    