    #include<stdio.h>
    #include<stdlib.h>

    struct node {
        int data;
        struct node *next;
    } *head, *temp, *curr, *left;

/* To add new node in Link list */

    void add(int num) {
        int i=0;
        temp = (struct node *) malloc(sizeof(struct node));
        temp->data = num;

            if(head == NULL) {
                head = temp;
                head->next = NULL;
            }
            else
            {
                temp->next = head;                
                head = temp;
            }

    }//add

/* To add new node in Link list after the specified location */

    void add_after(int num, int loc)
    {
        int i=0;
        temp = (struct node *) malloc(sizeof(struct node));
        temp->data = num;
        curr = head;
            if(head == NULL) {
                    head = temp;
                    head->next = NULL;
            }
            else {
                for(i=0; i<loc; i++) {
                    left = curr;
                    curr = curr->next;
                }

                left->next = temp;
                temp->next = curr;
            }//else
    }

/* To append new node in Link list */

    void append(int data) {

        temp = (struct node *) malloc(sizeof(struct node));
        temp->data = data;
        curr = head;

        if(curr == NULL) {
            head = temp; 
            head->next = NULL;
        }
        
        while(curr->next != NULL) {
            curr = curr->next;
        }
        curr->next = temp;
        curr = temp;
        curr->next = NULL;
    }

/* To delete node in Link list which contains the specified number */

    void delete(int num) {
        curr = head;

        if(curr == NULL) {
            printf("Link List is empty");
        }
        else
        {
            while(curr != NULL) {
               
                if(curr->data == num) {

                    if(curr == head) {
                    head = curr->next;
                    free(curr);
                    break;
                }
                    left->next = curr->next;
                    free(curr);
                    break;
                }
                else {
                    left = curr;
                    curr = curr->next;
                }
            }
        }
    }

/* To delete the entire Link list */

    void deleteAll() {
        curr = head;
        if(curr == NULL) {
            printf("Link list is empty");
        }
        else {
            while(curr != NULL) {
                left = curr->next;
                free(curr);
                curr = left;
            }
            head = NULL;
            printf("Deleted Link list");
        }
    }

/* To display all nodes in Link list */

    void disp() {
        if(head == NULL) {
            printf("Link list is empty");
            return;
        }
        else { 
            curr = head;
                 printf("\nData is\n");
                while(curr != NULL) {
                    printf("%d\t ",curr->data);
                    curr = curr->next;
                } //while
            }//else
        }


    int main() {

        int choice;
        int num,loc;

        while(1)
        {
            printf("\n\n1. Add");
            printf("\n2. Add after");
            printf("\n3. Append");
            printf("\n4. Delete");
            printf("\n5. Delete All");
            printf("\n6. Display");
            printf("\n7. Exit");
            printf("\n---------------------\n");
            printf("\nEnter choice\t");
            scanf("%d",&choice);
             printf("\n");
            

        switch(choice) {
            case 1: printf("\nEnter data\n");
                    scanf("%d",&num);
                    add(num);
                    break;
            case 2: printf("\nEnter data and location \n");
                    scanf("%d%d",&num,&loc);
                    add_after(num,loc);
                    break;
            case 3: printf("\nEnter the data\n");
                    scanf("%d",&num);
                    append(num);
                    break;
            case 4: printf("\nEnter the number to delete \n");
                    scanf("%d",&num);
                    delete(num);
                    break;
            case 5: deleteAll();
                    break;
            case 6: disp();
                    break;
            case 7: return 0;
            
            default: printf("\nIncorrect choice");
                    break;

        }
    }//while

        return 0;
    }