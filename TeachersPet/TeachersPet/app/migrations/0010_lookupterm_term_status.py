# Generated by Django 3.2 on 2021-04-10 04:32

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('app', '0009_alter_coursestudent_course'),
    ]

    operations = [
        migrations.AddField(
            model_name='lookupterm',
            name='term_status',
            field=models.CharField(choices=[('CM', 'Completed'), ('CU', 'Current'), ('FU', 'Future')], default='FU', max_length=2),
        ),
    ]
