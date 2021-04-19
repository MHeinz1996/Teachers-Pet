# Generated by Django 3.2 on 2021-04-16 21:46

from django.conf import settings
from django.db import migrations, models
import django.db.models.deletion


class Migration(migrations.Migration):

    dependencies = [
        migrations.swappable_dependency(settings.AUTH_USER_MODEL),
        ('app', '0010_lookupterm_term_status'),
    ]

    operations = [
        migrations.CreateModel(
            name='AdminUsers',
            fields=[
                ('id', models.BigAutoField(primary_key=True, serialize=False)),
                ('adminuser', models.ForeignKey(null=True, on_delete=django.db.models.deletion.RESTRICT, to=settings.AUTH_USER_MODEL)),
            ],
        ),
    ]
