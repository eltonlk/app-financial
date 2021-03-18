from rest_framework import viewsets
from rest_framework import permissions

from .models import BankAccount
from .serializers import BankAccountSerializer

class BankAccountsViewSet(viewsets.ModelViewSet):
    queryset = BankAccount.objects.all()
    serializer_class = BankAccountSerializer
