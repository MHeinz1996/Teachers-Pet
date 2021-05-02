# Generated by Django 3.2 on 2021-04-09 21:02

from django.db import migrations, models
import django.db.models.deletion


class Migration(migrations.Migration):

    initial = True

    dependencies = [
    ]

    operations = [
        migrations.CreateModel(
            name='CourseAssignment',
            fields=[
                ('id', models.AutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('assignmentdate', models.DateField(db_column='assignmentDate')),
                ('duedate', models.DateField(db_column='dueDate')),
                ('description', models.TextField()),
                ('pointspossible', models.PositiveIntegerField(db_column='pointsPossible')),
            ],
        ),
        migrations.CreateModel(
            name='LookupDepartment',
            fields=[
                ('id', models.AutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('departmentname', models.CharField(db_column='departmentName', max_length=50, unique=True)),
            ],
        ),
        migrations.CreateModel(
            name='LookupTerm',
            fields=[
                ('id', models.AutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('term', models.CharField(max_length=50)),
                ('termstart', models.DateField(db_column='termStart')),
                ('termend', models.DateField(db_column='termEnd')),
            ],
        ),
        migrations.CreateModel(
            name='TeacherCertification',
            fields=[
                ('id', models.AutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('certification', models.CharField(max_length=255)),
                ('certdate', models.DateField(db_column='certDate')),
                ('expirationdate', models.DateField(db_column='expirationDate')),
            ],
        ),
        migrations.CreateModel(
            name='StudentSubmission',
            fields=[
                ('id', models.AutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('dateuploaded', models.DateField(db_column='dateUploaded')),
                ('submission', models.CharField(max_length=100)),
                ('pointsearned', models.PositiveIntegerField()),
                ('teachernotes', models.TextField(db_column='teacherNotes')),
                ('assignment', models.ForeignKey(on_delete=django.db.models.deletion.RESTRICT, to='app.courseassignment')),
            ],
        ),
        migrations.CreateModel(
            name='LookupCourse',
            fields=[
                ('id', models.AutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('coursename', models.CharField(db_column='courseName', max_length=50, unique=True)),
                ('coursecode', models.CharField(db_column='courseCode', max_length=4)),
                ('department', models.ForeignKey(blank=True, db_column='department', null=True, on_delete=django.db.models.deletion.RESTRICT, to='app.lookupdepartment')),
            ],
        ),
        migrations.CreateModel(
            name='CourseStudent',
            fields=[
                ('id', models.AutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('grade', models.DecimalField(blank=True, decimal_places=0, max_digits=10, null=True)),
                ('course', models.ForeignKey(on_delete=django.db.models.deletion.RESTRICT, to='app.lookupcourse')),
            ],
        ),
        migrations.CreateModel(
            name='CourseSchedule',
            fields=[
                ('id', models.AutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('course', models.ForeignKey(on_delete=django.db.models.deletion.RESTRICT, to='app.lookupcourse')),
                ('term', models.ForeignKey(on_delete=django.db.models.deletion.RESTRICT, to='app.lookupterm')),
            ],
        ),
        migrations.AddField(
            model_name='courseassignment',
            name='course_schedule',
            field=models.ForeignKey(on_delete=django.db.models.deletion.DO_NOTHING, to='app.courseschedule'),
        ),
    ]