# Generated by Django 3.2 on 2021-06-09 22:13

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('app', '0025_auto_20210607_2326'),
    ]

    operations = [
        migrations.AlterField(
            model_name='studentsubmission',
            name='submission',
            field=models.FileField(null=True, upload_to='documents/', verbose_name='Submission'),
        ),
    ]
