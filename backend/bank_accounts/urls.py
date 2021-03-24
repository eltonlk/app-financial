from rest_framework import routers
from django.urls import include, path

from . import views

app_name = 'bank_accounts'

router = routers.DefaultRouter()
router.register('', views.BankAccountsViewSet, basename='bank_accounts')

urlpatterns = router.urls
