#include<stdio.h>
class stk
{
   char stack[100],ch;
   int top;
   public:
   stk()
   {
     top=-1;
   }
   void push (char ch)
   {
       stack[++top]=ch;
    }
    char pop()
    {
 
       return(stack[top--]);
    }
   int isempty()
    {
       if(top==-1)
       {
    // printf("\nStack empty");
      return(1);
       }
    return(0);
    }
int    isfull()
    {
       if(top>99)
       {
      printf("\nStack full");
     return(0);
       }
       return(1);
    }
};