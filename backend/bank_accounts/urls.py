from rest_framework import routers
from django.urls import include, path

from . import views

app_name = 'bank_accounts'

router = routers.DefaultRouter()
router.register('bank_accounts', views.BankAccountsViewSet)

urlpatterns = router.urls
