/*
Title - Dynamic Queue program
Author - Chinmay Mahajan 
*/
#include<iostream.h>
#include<conio.h>
#include<process.h>
 
class dqueue
{
    struct node
    {
        int data;
        node *next;
 
    }*front,*rear,*temp;
    public: dqueue()
        {
        front=NULL;
        rear=NULL;
        }
        void add();
        void del();
        void display();
};
void dqueue::add()
{
    temp=new node();
 
    cout<<"Enter the Data \t";
    cin>>temp->data;
 
    if(front==NULL)
    {
        front=temp;
        rear=temp;
    }
    else
    {
    temp->next=NULL;
    rear->next=temp;
    rear=temp;
 
    }
 
 
} //add()
 
void dqueue::del()
{
temp=new node();
temp=front;
if(front==NULL)
{
cout<<"No Data Found";
}
else
{
front=front->next;
delete temp;
cout<<"Deleted Successfully";
}//else
}//delete
 
void dqueue::display()
{
    temp=new node();
    temp=front;
 
    while(temp!=NULL)
    {
        cout<<temp->data;
        temp=temp->next;
    }
}
void main()
{
    clrscr();
    dqueue d;
    int ch;
    do
    {
    cout<<"\n1.Insert\n2.Delete\n3.Display \n4.Exit\t";
    cin>>ch;
    switch(ch)
    {
    case 1:d.add();
        break;
       case 2:d.del();
        break;
    case 3:d.display();
        break;
    case 4: exit(0);
    default: cout<<"Incorrect Input";
    }
       }while(ch!=4);
 
}