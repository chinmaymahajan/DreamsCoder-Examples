#include <stdio.h>
#include <stdlib.h>
  
struct tree
{
    struct tree *left;
    int data;
    struct tree *right;
};
  
struct queue
{
    struct tree *ptr;
    struct queue *next;
};
  
  
void Append(struct tree **root, int data)
{
    if(*root == NULL )
    {
        *root = malloc(sizeof(struct tree));
        (*root)->data = data;
        (*root)->left = (*root)->right = NULL;
    }
    else
    if( data data )
        Append(&(*root)->left, data);
    else
        Append(&(*root)->right, data);
}
  
void Display(struct tree *temp)
{
    if(temp)
    {
        Display(temp->left);
        printf("%d,",temp->data);
        Display(temp->right);
    }
}
  
void AppendQ(struct queue **front,
 struct queue **end, struct tree *ptr)
{
    struct queue *newnode;
    newnode = malloc(sizeof(struct queue));
    newnode->ptr = ptr;
    newnode->next = NULL;
    if( *front == NULL )
        *front = *end = newnode;
    else
    {
        (*end)->next = newnode;
        *end = newnode;
    }
}
  
struct tree * Delete(struct queue **front)
{
    struct queue *temp = *front;
    struct tree *ptr = temp->ptr;
    *front = temp->next;
    free(temp);
    return ptr;
}
  
void BFS(struct tree *temp)
{
    struct queue *front, *end;
    front = end = NULL;
    if( temp )
        AppendQ(&front,&end,temp);
    while(front)
    {
            temp = Delete(&front);
            printf("%d,",temp->data);
            if( temp->left )
                AppendQ(&front,&end,temp->left);
            if( temp->right)
                AppendQ(&front,&end,temp->right);
    }
}
  
main()
{
    struct tree *root = NULL;
    Append(&root,35);
    Append(&root,20);
    Append(&root,18);
    Append(&root,22);
    Append(&root,48);
    Append(&root,50);
    Display(root);
    printf("");
    BFS(root);
    printf("");