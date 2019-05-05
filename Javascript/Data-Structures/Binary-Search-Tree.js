class BinarySearchTree {
	constructor() {
		this.root = null;
	}

	insertNode (val) {
		let node = {
			value: val,
			right: null,
			left: null
		}
		let curr;

		if(!this.root) {
				this.root = node;
				return;
			} else {
				curr = this.root;

			while(curr) {
				if(curr.value > val) {
					if(curr.left === null) {
						curr.left = node;
						break;
					} else curr =  curr.left;
				} else if(curr.value < val) {
						if(curr.right === null) {
							curr.right = node;
							break
						} else curr = curr.right
				} else {
						console.log('Duplicate Value');
					break;
				}
			}
		}
	}

	preOrder(currnode) {
		console.log(currnode.value)
		if(currnode.left) this.preOrder(currnode.left);
		if(currnode.right) this.preOrder(currnode.right);
	}

	inOrder(currnode) {
		if(currnode.left) this.inOrder(currnode.left);
		console.log(currnode.value)
		if(currnode.right) this.inOrder(currnode.right);
	}

	postOrder(currnode) {
		if(currnode.left) this.postOrder(currnode.left);
		if(currnode.right) this.postOrder(currnode.right);
		console.log(currnode.value)
	}
}

var BST = new BinarySearchTree();

BST.insertNode(8);
BST.insertNode(3);
BST.insertNode(10);
BST.insertNode(1);
BST.insertNode(6);
BST.insertNode(14);
BST.insertNode(4);
BST.insertNode(7);
BST.insertNode(13);
console.log("Pre-Order");
BST.preOrder(BST.root);
console.log("In-Order");
BST.inOrder(BST.root)
console.log("Post-Order");
BST.postOrder(BST.root)
