#include<stdio.h>
void main()
{
int a[10];
int n,i,temp,d;
printf("How many elements:\t");
scanf("%d",&n);
printf("Enter the elements:\n");
for(i=0;i<n;i++)
{
scanf("%d",&a[i]);
}
for(i=0;i<n;i++)
{
if(a[i]>a[i+1])
{
temp=a[i];
a[i]=a[i+1];
a[i+1]=temp;
}
}
printf("The diffrernde is:\n");
d=a[0]-a[n-1];
printf("%d\n",d);
}





