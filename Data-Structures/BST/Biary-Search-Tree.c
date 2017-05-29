#include <stdio.h>
#include <stdlib.h>

typedef struct BST
{
    int data;
    struct BST *left;
    struct BST *right;
} node;

node *create();
void insert(node *, node *);
void preorder(node *);
void postorder(node *);
void inorder(node *);

int main()
{
    int ch;
    node *root = NULL, *temp, *current;
    printf("\nEnter the number of Nodes you want :\t");
    scanf("%d", &ch);
    printf("\nEnter %d Nodes data :\n", ch);
    do
    {
        temp = create();
        if (root == NULL)
            root = temp;
        else
            insert(root, temp);
        ch--;

    } while (ch != 0);

    printf("\nPreorder Traversal\n");
    preorder(root);

    printf("\nInorder Traversal\n");
    inorder(root);

    printf("\nPostorder Traversal\n");
    postorder(root);

    printf("\n");

    return 0;
}

node *create()
{
    node *temp;

    temp = (node *)malloc(sizeof(node));
    scanf("%d", &temp->data);
    temp->left = temp->right = NULL;
    return temp;
}

void insert(node *root, node *temp)
{
    if (root == NULL)
    {
        root = temp;
    }
    else
    {

        if (temp->data < root->data)
        {
            if (root->left != NULL)
                insert(root->left, temp);
            else
                root->left = temp;
        }

        if (temp->data > root->data)
        {
            if (root->right != NULL)
                insert(root->right, temp);
            else
                root->right = temp;
        }
    }
}

void preorder(node *root)
{
    if (root != NULL)
    {
        printf("%d \t", root->data);
        preorder(root->left);
        preorder(root->right);
    }
}

void postorder(node *root)
{
    if (root != NULL)
    {
        postorder(root->left);
        postorder(root->right);
        printf("%d \t", root->data);
    }
}

void inorder(node *root)
{
    if (root != NULL)
    {
        inorder(root->left);
        printf("%d \t", root->data);
        inorder(root->right);
    }
}