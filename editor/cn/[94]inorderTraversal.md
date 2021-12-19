无论是前、中、后序遍历，都是先访问根节点，再访问它的左子树，再访问它的右子树。

![](https://pic.leetcode-cn.com/0005d6f797d3281bbe2be08effd0f8fa991dc8126aef754929af34edf650626a-image.png)

以上述中，前中后序遍历顺序如下：

前序遍历（中左右）：5 4 1 2 6 7 8
中序遍历（左中右）：1 4 2 5 7 6 8
后序遍历（左右中）：1 2 4 7 8 6 5

区别在哪里？比如中序遍历，它是将 do something with root（处理当前节点）放在了访问完它的左子树之后。比方说，打印节点值，就会产生「左 根 右」的打印顺序。

![](https://pic.leetcode-cn.com/1600022563-FCcWIJ-image.png)

前、中、后序遍历都是基于DFS，节点的访问顺序如上图所示，每个节点有三个不同的驻留阶段，即每个节点会被经过三次：

1. 在递归它的左子树之前。
2. 在递归完它的左子树之后，在递归它的右子树之前。
3. 在递归完它的右子树之后。

我们将 do something with root 放在这三个时间点之一，就分别对应了：前、中、后序遍历。
所以，它们的唯一区别是：在什么时间点去处理节点，去拿他做文章。
中序遍历的迭代实现
搞清楚概念后，怎么用栈去模拟递归遍历，并且是中序遍历呢？

dfs 一棵树，如下图，先递归节点A，再递归B，再递归D，一个个压入递归栈。

![](https://pic.leetcode-cn.com/1600027366-jHBJMK-image.png)

也就是说，先不断地将左节点压入栈，我们写出这部分代码：

```javascript
while (root) {
    stack.push(root);
    root = root.left;
}
```

DFS的访问顺序是：根节点、左子树、右子树，现在要访问已入栈的节点的右子树了。

并且是先访问『位于树的底部的』即『位于栈的顶部的』节点的右子树。

于是，让栈顶节点出栈，出栈的同时，把它的右子节点压入栈，相当于递归右子节点。

因为是中序遍历，在栈顶节点的右子节点压栈之前，要处理出栈节点的节点值，将它输出。

![](https://pic.leetcode-cn.com/1600046829-vQeqLn-image.png)

新入栈的右子节点（右子树），就是对它递归。和节点A、B、D的压栈一样，它们都是子树。

递归不同的子树要做一样的事情，一样要先将它的左子节点不断压栈，然后再出栈，带出右子节点入栈

![](https://pic.leetcode-cn.com/1600046603-eBtEoP-image.png)

即栈顶出栈的过程，也要包含下面代码，可见下面代码重复了两次：

```javascript
while (root) {
    stack.push(root);
    root = root.left;
}
```


其实这两个循环，分别对应了下面的两次 inorder 调用，就是递归压栈：

```javascript
inorder(root.left);
res.push(root.val);
inorder(root.right);
```

**迭代实现 代码**

```javascript
const inorderTraversal = (root) => {
  const res = [];
  const stack = [];

  while (root) {        // 能压入栈的左子节点都压进来
    stack.push(root);
    root = root.left;
  }
  while (stack.length) {
    let node = stack.pop(); // 栈顶的节点出栈
    res.push(node.val);     // 在压入右子树之前，处理它的数值部分（因为中序遍历）
    node = node.right;      // 获取它的右子树
    while (node) {          // 右子树存在，执行while循环    
      stack.push(node);     // 压入当前root
      node = node.left;     // 不断压入左子节点
    }
  }
  return res;
};
```

我把**递归**写法再拿出来，对比一下，感受一下，区别在哪里，相同点在哪里。

```javascript
const inorderTraversal = (root) => {
  const res = [];
  const inorder = (root) => {
    if (root == null) {
      return;
    }
    inorder(root.left);
    res.push(root.val);
    inorder(root.right);
  };
  inorder(root);
  return res;
};
```

![](https://pic.leetcode-cn.com/1600046351-mjZerJ-image.png)

**后记**
暂且分析中序遍历，前序遍历和后序遍历的迭代版分析也许会补充上来，大家可以动手试试。

明确这三种遍历都是基于DFS递归，清楚概念，再明白递归其实是压栈出栈的操作，比照着，用一个栈，去模拟递归栈，用迭代，去模拟递归的逻辑，就不难写出迭代法的代码。
