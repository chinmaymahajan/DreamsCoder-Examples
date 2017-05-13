#include <stdio.h>
#include <stdlib.h>

struct node
{
    int data;
    struct node *next;
} * temp, *head, *curr;

void ReversePrint(struct node *head);
void RegularPrint(struct node *curr);
void add();

void add()
{
    int num;
    int data, i;
    printf("Enter number of nodes :");
    scanf("%d", &num);
    for (i = 0; i < num; i++)
    {
        temp = (struct node *)malloc(sizeof(struct node));
        printf("Enter the data :");
        scanf("%d", &data);
        temp->data = data;
        if (i == 0)
        {
            head = temp;
            curr = head;
        }
        else
        {
            curr->next = temp;
            curr = temp;
        }
    }
    printf("\nRegularPrintlaying in regular order\n");
    curr = head;
    RegularPrint(curr);
    printf("\nRegularPrintlaying in reverse order\n");
    ReversePrint(head);
}

void RegularPrint(struct node *curr)
{
    if (curr == NULL)
        return;
    printf("%d \t", curr->data);
    curr = curr->next;
    RegularPrint(curr);
}

void ReversePrint(struct node *head)
{
    if (head == NULL)
        return;
    ReversePrint(head->next);
    printf("%d \t", head->data);
}

int main()
{
    add();

    return 0;
}