# Generated by Django 3.2 on 2021-04-16 21:56

from django.db import migrations


class Migration(migrations.Migration):

    dependencies = [
        ('app', '0012_rename_adminusers_adminuser'),
    ]

    operations = [
        migrations.DeleteModel(
            name='AdminUser',
        ),
    ]