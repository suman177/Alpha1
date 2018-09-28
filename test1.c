#include<stdio.h>
int c=0;
//This program can check if the number in same position of different array are similar or not.
void main()
{
int a[10],b[10],i,j;
printf("\nEnter the guess of player 1 :\n");
for(i=0;i<4;i++)
{
scanf("%d",&a[i]);
}
printf("\nEnter the guess of player 2 :\n");
for(j=0;j<4;j++)
{
scanf("%d",&b[j]);
}
for(i=0,j=0;i<4,j<4;i++,j++)
{
if(a[i]==b[j])
{
c++;
}
}
printf("%d Cow\n",c);
}


