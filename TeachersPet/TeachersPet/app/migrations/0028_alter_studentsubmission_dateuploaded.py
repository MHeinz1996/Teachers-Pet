# Generated by Django 3.2 on 2021-06-09 22:19

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('app', '0027_alter_studentsubmission_submission'),
    ]

    operations = [
        migrations.AlterField(
            model_name='studentsubmission',
            name='dateuploaded',
            field=models.DateField(db_column='dateuploaded', null=True, verbose_name='Upload date'),
        ),
    ]
