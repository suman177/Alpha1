#include<stdio.h>
#include<math.h>
#define n 4
void cb(int act1[10],int act2[10]);
void bd();
//Ask user for Inputs
void main()
{
int a,b,i=0,act1[10],act2[10];
printf("Enter the player 1 number :\t");
scanf("\n%d",&a);
printf("Enter the player 2 number :\t");
scanf("%d",&b);
for(i=0;i<n;i++)
{
act1[i]=a%10;
a=a/10;
act2[i]=b%10;
b=b/10;
}
for(i=3;i>=0;i--)
{
printf("%d\t%d",act1[i],act2[i]);
printf("\n");
}
printf("\n");
//cb(play1[10],play2[10]);
bd();
}


// FUNCTION TO ASK GUESSES OF PLAYER 1 AND PLAYER 2

void bd()
{
int i=0,guess1,guess2,play1[10],play2[10];
printf("Enter the player 1 Guess : \n");
printf("_____________________________\n");
scanf("\n\t%d",&guess1);
printf("\t\tEnter the player 2 Guess : \n");
printf("\t\t_____________________________\n");
scanf("\t\t\t\n%d",&guess2);
for(i=0;i<n;i++)
{
play1[i]=guess1%10;
guess1=guess1/10;
play2[i]=guess2%10;
guess2=guess2/10;
}

/*for(i=3;i>=0;i--)
{
printf("Player1:%d\tPlayer2:%d",play1[i],play2[i]);
printf("\n");
}
printf("\n");
*/

}

//TO CHECK EQUAL PART


void cb(int act1[10],int act2[10])
{
int i=0,j=0,k=0,count1=0,count2=0,count3=0,count4=0; 
bd(act1[10],act2[10]);

for(i=0;i<=3;i++)
{
if(act1[i]==act2[i])
{
count1++;
}
}
printf("%dCow",count1++);






for(j=0;j<n;j++)
{
	for(k=1;k<n;k++)
{
	if(play1[j]==play2[k])
{
count1++;
}}}
	if(play1[3]==play2[0])
{
count1++;
}
printf("Players 1's %d Cow.\n ",count1);

	for(j=0;j<n;j++)
{
	for(k=1;k<n;k++)
{
	if(play2[j]==play1[k])
{
count2++;
}}}
	if(play2[3]==play1[0])
{
count2++;
}
printf("Players 2's %d Cow. \n ",count2);
for(i=0;i<n;i++)
{
for(j=0;j<n;j++)
{act
if(play1[i]==play2[j])
{
count3++;
}}}
printf("Player 1's %d Bull. \n",count3);
	for(i=0;i<n;i++)
{
	for(j=0;j<n;j++)
{
	if(play2[i]==play1[j])
{
count4++;
}}}
printf("Player 2's %d Bull. \n",count4);


printf("Game Over!!\n");

 
}
while((play1[1]==play2[1]&&play1[2]==play2[2]&&play1[3]==play2[3]&&play1[4]==play2[4]))
}

