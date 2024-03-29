### **方法一：单调栈**

我们可以忽略数组 nums1，先对将 nums2 中的每一个元素，求出其下一个更大的元素。随后对于将这些答案放入哈希映射（HashMap）中，再遍历数组 nums1，并直接找出答案。对于 nums2，我们可以使用单调栈来解决这个问题。

我们首先把第一个元素 nums2[1] 放入栈，随后对于第二个元素 nums2[2]，如果 nums2[2] >nums2[1]，那么我们就找到了 nums2[1] 的下一个更大元素 nums2[2]，此时就可以把 nums2[1] 出栈并把 nums2[2] 入栈；如果 nums2[2] <= nums2[1]，我们就仅把 nums2[2] 入栈。对于第三个元素 nums2[3]，此时栈中有若干个元素，那么所有比 nums2[3] 小的元素都找到了下一个更大元素（即 nums2[3]），因此可以出栈，在这之后，我们将 nums2[3] 入栈，以此类推。

可以发现，我们维护了一个单调栈，栈中的元素从栈顶到栈底是单调不降的。当我们遇到一个新的元素 nums2[i] 时，我们判断栈顶元素是否小于 nums2[i]，如果是，那么栈顶元素的下一个更大元素即为 nums2[i]，我们将栈顶元素出栈。重复这一操作，直到栈为空或者栈顶元素大于 nums2[i]。此时我们将 nums2[i] 入栈，保持栈的单调性，并对接下来的 nums2[i + 1], nums2[i + 2]... 执行同样的操作。

下面的动画中给出了一个例子。

![gif](https://raw.githubusercontent.com/moon-zhangyue/leetcode/master/editor/cn/image/%5B496%5DnextGreaterElement/496.gif)

**复杂度分析**

- **时间复杂度**： ![[公式]](https://www.zhihu.com/equation?tex=O%28M+%2B+N%29) ，其中 ![[公式]](https://www.zhihu.com/equation?tex=M) 和 ![[公式]](https://www.zhihu.com/equation?tex=N) 分别是数组 nums1 和 nums2 的长度。
- **空间复杂度**： ![[公式]](https://www.zhihu.com/equation?tex=O%28N%29) 。我们在遍历 nums2 时，需要使用栈，以及哈希映射用来临时存储答案。

labuladong https://labuladong.gitee.io/algo/2/18/43/

变成狂想曲: 这个的动画比较通俗易懂

https://mp.weixin.qq.com/s?__biz=Mzg3NzUyOTk5NA==&mid=2247484517&idx=1&sn=12d8bf468576ee0b820aeae9c4f81ff7&chksm=cf20da80f857539695d81dd3494e783ded2e541e86c0f7db28df145a4ed2a98274f9c219095f&token=1057380703&lang=zh_CN#rd

# 单调栈思路

当然，我在看单调栈题解之前，肯定是不知道这个思路以及做法的，这里的想法自然也是来自题解区的各位大佬。其中我在看到了LeetCode用户[labuladong](https://leetcode-cn.com/problems/next-greater-element-i/solution/dan-diao-zhan-jie-jue-next-greater-number-yi-lei-w/)题解时觉得非常的形象也较好理解，这里借鉴下。

比如我们要求数组`[2,1,2,4,3]`中每个元素的下一个更大数，其实答案很明显是`[4,2,4,-1,-1]`，要做到求出此结果，我们一样可以从当前元素往后遍历，一直遇到第一个比自己大的元素，若遍历完还没遇到就记录为-1级了。

其实有个很有趣的比喻就是，我们可以将数组中的每个元素理解为不同身高的人，然后每个人往后看，那么这个人的视线一定是被第一个比自己高的人给挡住，用图表示就是：

![](D:\Visual-NMP-x64\www\leetcode\editor\cn\image\[496]nextGreaterElement\1.png)

那么怎么用程序表示这个过程呢？这里就得借用单调栈了。我们都知道栈有FILO（先进后出）的特性。所谓单调栈，即是入栈时经过某种处理，让入栈后的元素满足单调递增或者单调递减的顺序，说直白点就是有序的栈。可能说到这还是比较模糊，我们直接针对`[2,1,2,4,3]`的例子给出一个代码，再去分析，我想这样会好理解一点，代码如下：

```javascript
var nextGreaterElement = function (nums) {
    let res = [];
    let stack = [];
    // 因为栈是先进后出，所以倒序遍历反而满足了正向使用
    // 对应到比身高里面，我们都是往后看，那就从最后一个开始，一个接一个往后看，这也也便于知道谁是第一个比自己高的人
    for (let i = nums.length - 1; i >= 0; i--) {
        // 如果栈不为空，且栈顶第一个元素（对应到数组中最后一个元素）比当前nums[i]还矮就得弹出去
        while (stack.length && stack[stack.length - 1] <= nums[i]) {
            // 比nums[i]矮的人都弹出去
            // 因为nums是倒序遍历，每个人都是往后看比身高，假设nums[i]比后面的人还高，那么nums[i]前面的人一定只能看到
            // 自己，而看不到nums[i]后面的人，那么记录后面的人是没意义的，因为反正都会被nums[i]挡住，因此统统弹出去不记录。
            stack.pop();
        };
        // 记录第i个比自己更高的人
        // 因为上面的逻辑中，比nums[i]矮的人会被全部弹出栈，最坏的情况就是没有比自己高的，栈被清空了，因此为-1；
        // 而如果遇到比自己高的人是会停止弹出操作，所以栈顶第一个人一定是比自己高的人，也就是数组中最后一个人。
        res[i] = stack.length ? stack[stack.length - 1] : -1;
        // 记录nums[i]，因为他可能是前面的人的第一个遇到比自己高的人，不高也没关系，反正会被弹出去
        stack.push(nums[i]);
    };
    return res;
};
```

大家可以尝试运行下这段代码，画图理解下，不理解没关系，下面我会画图解释这个过程：

第一次我们拿到了3，用3跟栈中做比较，结果栈是空的，没有能跟自己比较身高的人，行吧，那么3对应索引的答案就是-1，同时我们得把3加入栈中，因为很可能3是前面的人中，某个人能看到的第一个比自己高的人。

![](D:\Visual-NMP-x64\www\leetcode\editor\cn\image\[496]nextGreaterElement\2.png)

第二次比较，我们取到了4，一比较结果3还没4高，由于4是站在3前面的，4更前面的人最差就是看到自己，因为3被挡住了所以不可能被其他人看到，我们将3弹出去，此时栈又是空，对应的答案我们记录为-1，同时将4加入栈中，因为4可能是前面的人能看到的第一个更高的人。

![img](https://img2020.cnblogs.com/blog/1213309/202103/1213309-20210328213441844-288256899.png)

第三次比较，我们取到了2，结果一比较2没有4高，由于栈此时不为空，那么栈顶就是比2高的人，答案记录为4，同时我们还是要将2加入栈，因为2也可能是前面的人能看到的第一个比自己高的人。

![img](https://img2020.cnblogs.com/blog/1213309/202103/1213309-20210328213449824-1468799109.png)

第四次比较，我们取到了1，它的情况跟第三次比较相同，没有2大，所以栈不为空，栈顶第一个就是比1大的人，记录答案为2，同时把1加入栈。

![img](https://img2020.cnblogs.com/blog/1213309/202103/1213309-20210328213458913-1415520076.png)

第五次比较，我们取到了2，跟栈顶第一个元素1进行比较，结果发现1没有2高，因此我们将1弹出栈。此时栈不为空，还有其他人可以继续和2比较，我们继续比，此时的栈顶是2，但2不能说比2更高，我们又得把栈顶的2弹出去，此时栈仍然不为空，继续比较。此时栈顶成了4，哎，4比2要大，那么答案记录为4，同时将2加入栈.

![img](https://img2020.cnblogs.com/blog/1213309/202103/1213309-20210328213507294-189124966.png)

第六次比较已经不满足循环条件，跳出循环，我们得到了对应数组中每个元素的更大元素。

OK，那么到这里，我们详细介绍了借用单调栈解决上述例子的问题，那么如果解决文中的题目呢？其实仍然是一样的思路，题目中`nums1`是`nums2`的子集，只要我们能得出`nums2`中每个比自己大的元素并记录起来，再遍历`nums1`不就能直接得出答案了吗？

直接上代码：

```javascript
var nextGreaterElement = function (nums1, nums2) {
    let res = [];
    let stack = [];
    // 用于记录nums2中每个比自己大的值
    let map = new Map();
    for (let i = nums2.length - 1; i >= 0; i--) {
        while (stack.length && stack[stack.length - 1] <= nums2[i]) {
            stack.pop();
        };
        // 记录i对应的值，便于后续nums1查找
        map.set(nums2[i], stack.length ? stack[stack.length - 1] : -1);
        stack.push(nums2[i]);
    };
    for (let i = 0; i < nums1.length; i++) {
        // 直接根据key取结果就好了
        res.push(map.get(nums1[i]));
    };
    return res;
};
```

