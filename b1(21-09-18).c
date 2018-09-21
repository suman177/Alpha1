#include<stdio.h>
#include<math.h>
#include<stdlib.h>
#define n 4
void s1();
void rules();
void s2();
void s4();
void s3();

int a,b,i=0,act1[4],act2[4];
//Ask us
void main()
{
int choice;
while(1)
{
printf("\n1.Multi player.\n");
printf("2.Rules.");
printf("\n3.Exit.\n");
printf("\tEnter your choice:\t");
scanf("%d",&choice);

switch(choice)
{
case 1:s1();break;
case 2:rules();break;
case 3:exit(0);
default:printf("\nTry again\n");
}
}
}

void rules()
{
printf("\n\n \t   RULES");
printf("\n1.Repeatation of digit/number is not allowed.\n");
printf("2.Digit cant be zero.\n");
printf("3.Must be 4 digit\n");
}

void s1()
{
printf("Enter the player 1 number :\t");
scanf("\n%d",&a);
if(a>=1000&&a<=9999)
{
s2();
}
else
{
printf("\nYou cant have more than 4 digits.\n");
s1();
}
}


void s2()
{
int j;
for(i=0;i<4;i++)
{
act1[i]=a%10;
a=a/10;
}
for(i=0;i<3;i++)
{
for(j=0;j<3;j++)
{
if(i>0)
j=j+i;
if((act1[i]==act1[j+1]))
{
printf("\nNumber can't be repeated.\n");
s1();
}
}
}
s3();
}

void s3()
{
printf("Enter the player 2 number :\t");
scanf("%d",&b);
if(b>=1000&&b<=9999)
{
s4();
}
else
{
printf("\nYou cant have more than 4 digits.\n");
s3();
}
}

void s4()
{
int j;
for(i=0;i<4;i++)
{
act2[i]=b%10;
b=b/10;
}
for(i=0;i<3;i++)
{
for(j=0;j<3;j++)
{
if(i>0)
j=j+i;
if((act2[i]==act2[j+1]))
{
printf("\nNumber can't be repeated.\n");
s3();
}
}
}
printf("\nProgram Uptodate.\n");
exit(0);
}






