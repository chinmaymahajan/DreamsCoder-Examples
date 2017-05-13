/*
Title - Dynamic Stack program
Author - Chinmay Mahajan 
*/
#include<iostream.h>
#include<conio.h>
#include<process.h>
 
class dstack
{
    private:
        struct node
        {
        int data;
        node *next;
        }*top,*temp;
       public:
        dstack()
        {
        top=NULL;
        }
        void push();
        void pop();
        void display();
};
 
void dstack::push()
{
temp=new node();
cout<<"\nEnter the data\t";
cin>>temp->data;
 
    temp->next=top;
    top=temp;
 
}
 
void dstack::pop()
{
temp=new node();
temp=top;
top=top->next;
delete temp;
cout<<"Deleted";
}
 
void dstack::display()
{
temp=new node();
temp=top;
    while(temp!=NULL)
    {
    cout<<" "<<temp->data;
    temp=temp->next;
    }
}//display
 
void main()
{
clrscr();
dstack s;
int ch;
do
{
cout<<"\n1.PUSH\n2.POP\n3.Display\n4.Exit\n";
cout<<"Enter Your Choice :\t";
cin>>ch;
    switch(ch)
    {
    case 1:s.push();
        break;
    case 2:s.pop();
        break;
    case 3:s.display();
        break;
    case 4:exit(0);
    default : cout<<"Wrong Input";
    }
 }while(ch!=4);
}