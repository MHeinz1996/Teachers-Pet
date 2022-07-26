# Generated by Django 3.2 on 2021-04-09 23:24

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('app', '0005_dummydata_student'),
    ]

    operations = [
        migrations.AlterField(
            model_name='dummydata',
            name='className',
            field=models.CharField(db_column='ClassName', max_length=100),
        ),
        migrations.AlterField(
            model_name='dummydata',
            name='content',
            field=models.CharField(db_column='Content', max_length=100),
        ),
        migrations.AlterField(
            model_name='dummydata',
            name='dept',
            field=models.CharField(db_column='Dept', max_length=14),
        ),
        migrations.AlterField(
            model_name='dummydata',
            name='teacher',
            field=models.CharField(db_column='Teacher', max_length=255),
        ),
    ]
