// THIS PROGRSM CONTAINS BUGS
// Tyep mismatch, function scope.
#include <stdio.h>
#include <math.h>
#include <stdlib.h>
#include <ctype.h>
#define n 4
void s1();
void rules();
void s2();
void s4();
void s3();
void split();
void choice();
int guessp1();
int step1(int pro[]);
int check(int rule0[]);
int rule1chk(int rule1[], int com);
int guessp2();
int check2(int rule3[]);
int rule1chk2(int rule2[], int comm);
int step2(int pro1[]);
int a = 0, b, i = 0, act1[4], act2[4];
int go1[4], go2[4];

int main()
{
	int d;
	char c;
	printf("\n1.Multi player.\n");
	printf("2.Rules.");
	printf("\n3.Exit.\n");
	while (1)
	{
		printf("\tEnter your choice:\t");
		scanf("%d", &d);
		switch (d)
		{
		case 1:
			s1();
			break;
		case 2:
			rules();
			break;
		case 3:
			exit(0);
		default:
			printf("\nWrong Input\n");
		}
	}
	printf("\nWrong Choice\n");
	main();
}

void rules()
{
	printf("\n\n \t   RULES");
	printf("\n1.Repeatation of digit/number is not allowed.\n");
	printf("2.Digit can't be zero.\n");
	printf("3.Must be 4 digit\n\n");
}

void s1()
{
	int d;
	printf("\nEnter the player 1 number :\t");
	scanf("\n%d", &a);
	d = a;
	for (i = 0; i < 4; i++)
	{
		act1[i] = a % 10;
		a = a / 10;
	}

	if (d >= 0 && d <= 999)
	{
		printf("\nMust be of 4 different digits, without zer0s.\n");
		s1();
	}
	if (d >= 1000 && d <= 9999)
	{
		if ((act1[0] * act1[1] * act1[2] * act1[3]) != 0)
		{
			s2();
		}
		printf("\nCan't contain 0 as digit.\n");
		s1();
	}
	else
	{
		printf("\nMust be of 4 different digit, without zer0s.\n");
		s1();
	}
}

void s2()
{
	int j;
	for (i = 0; i < 3; i++)
	{
		for (j = 0; j < 3; j++)
		{
			if (i > 0)
				j = j + i;
			if ((act1[i] == act1[j + 1]))
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
	int c;
	int j;
	printf("\nEnter the player 2 number :\t");
	scanf("%d", &b);
	c = b;
	for (i = 0; i < 4; i++)
	{
		act2[i] = b % 10;
		b = b / 10;
	}
	if (c >= 0 && c <= 999)
	{
		printf("\nMust be of 4 different digits, without zer0s.\n");
		s3();
	}
	if (c >= 1000 && c <= 9999)
	{
		if ((act2[0] * act2[1] * act2[2] * act2[3]) != 0)
		{
			s4();
		}
		printf("\nCan't contain 0 as digit.\n");
		s3();
	}
	else
	{
		printf("\nMust be of 4 different digit, without zer0s.\n");
		s3();
	}
}

void s4()
{
	int j;
	for (i = 0; i < 3; i++)
	{
		for (j = 0; j < 3; j++)
		{
			if (i > 0)
				j = j + i;
			if ((act2[i] == act2[j + 1]))
			{
				printf("\nNumber can't be repeated.\n");
				s3();
			}
		}
	}
	guessp1();
}

int guessp1()
{
	int pnum, orgi;
	printf("\nEnter the player 1 guess  :\t");
	scanf("%d", &pnum);
	orgi = pnum;
	for (i = 0; i < 4; i++)
	{
		go1[i] = pnum % 10;
		pnum = pnum / 10;
	}
	rule1chk(go1, orgi);
}

int rule1chk(int rule1[], int com)
{
	int j;
	if (com >= 0 && com <= 999)
	{
		printf("\nMust be of 4 different digits, without zer0s.\n");
		guessp1();
	}
	if (com >= 1000 && com <= 9999)
	{
		for (i = 0; i < 3; i++)
		{
			for (j = 0; j < 3; j++)
			{
				if (i > 0)
					j = j + i;
				if (rule1[i] == rule1[j + 1])
				{
					printf("\nNumber can't be repeated.\n");
					guessp1();
				}
			}
		}
		check(rule1);
	}
	else
	{
		printf("\nMust be of 4 different digit, without zer0s.\n");
		guessp1();
	}
}

int check(int rule0[])
{
	if ((rule0[0] * rule0[1] * rule0[2] * rule0[3]) != 0)
	{
		step1(rule0);
	}
	else
	{
		printf("\nCan't contain 0.\n");
		guessp1();
	}
}

int step1(int pro[])
{
	int co = 0, bl = 0, j;

	for (i = 0; i < 4; i++)
	{
		for (j = 0; j < 4; j++)
		{

			if (pro[i] == act2[j])
			{
				if (i == j)
				{
					co++;
				}
				else
				{
					bl++;
				}
			}
			if (co == 4)
			{
				printf("\nGAME OVER PLAYER 1 WINS!!!\n");
				exit(0);
			}
		}
	}
	printf("\nCow = %d , Bull = %d\n", co, bl);
	guessp2();
}

// For player 2

int guessp2()
{
	int pnum, orgi;
	printf("\nEnter the player 2 guess  :\t");
	scanf("%d", &pnum);
	orgi = pnum;
	for (i = 0; i < 4; i++)
	{
		go2[i] = pnum % 10;
		pnum = pnum / 10;
	}
	rule1chk2(go2, orgi);
}

int rule1chk2(int rule2[], int comm)
{
	int j, z, cou = 0;
	if (comm >= 0 && comm <= 999)
	{
		printf("\nMust be of 4 different digits, without zer0s.\n");
		guessp2();
	}
	if (comm >= 1000 && comm <= 9999)
	{
		for (i = 0; i < 3; i++)
		{
			for (j = 0; j < 3; j++)
			{
				if (i > 0)
					j = j + i;
				if (rule2[i] == rule2[j + 1])
				{
					printf("\nNumber can't be repeated.\n");
					guessp2();
				}
			}
		}
		check2(rule2);
	}
	else
	{
		printf("\nMust be of 4 different digits, without zer0s.\n");
		guessp2();
	}
}

int check2(int rule3[])
{
	if ((rule3[0] * rule3[1] * rule3[2] * rule3[3]) != 0)
	{
		step2(rule3);
	}
	else
	{
		printf("\nCan't contain 0.\n");
		guessp2();
	}
}

int step2(int pro1[])
{
	int co = 0, bl = 0, j;

	for (i = 0; i < 4; i++)
	{
		for (j = 0; j < 4; j++)
		{

			if (pro1[i] == act1[j])
			{

				if (i == j)
				{
					co++;
				}

				else
				{
					bl++;
				}
			}

			if (co == 4)
			{
				printf("\nGAME OVER PLAYER 2 WINS!!!\n");
				exit(0);
			}
		}
	}
	printf("\nCow = %d , Bull = %d\n ", co, bl);
	guessp1();
}

afsdfkjasdklfjlkasdjlkfjalsjdflkjalsjdfljasldjflja
	asfasdfasdf
		asdfasdfadf
			asdfadsf
