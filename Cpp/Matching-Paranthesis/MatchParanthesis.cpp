 
/*Main Program*/
 
#include<iostream.h>
#include<conio.h>
#include"dreamscoder.h"
 
void main()
{
        stack s;
        boolean flag;
        char exp[100],ch,ch1;
        int i;
 
        clrscr();
 
        cout << "\nEnter An Expression : ";
        cin  >> exp;
 
        flag = true;
 
        for (i=0 ; exp[i] != '\0' ;i++)
        {
                ch = exp[i];
                if (ch == '(' || ch == '['
 || ch == '{')
                    s.push(ch);
                else
                if (ch == ')')
                {
                        ch1 = s.ret_top();
                        if (ch1 != '(')
                        {
                            flag = false;
                                break;
                        } // if
                        else
                            s.pop(ch1);
                } // else if
                else
                if (ch == ']')
                {
                        ch1 = s.ret_top();
                        if (ch1 != '[')
                        {
                            flag = false;
                                break;
                        } // if
                        else
                            s.pop(ch1);
                } // else if
                else
                if (ch == '}')
                {
                    ch1 = s.ret_top();
                        if (ch1 != '{')
                        {
                            flag = false;
                                break;
                        } // if
                        else
                            s.pop(ch1);
                } // else if
        } // for
 
        if (s.isempty() && flag)
            cout << "\nThe Expression Is Balanced.";
        else
            cout << "\nThe Expression Is Not Balanced.";
 
} // main
 