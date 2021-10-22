摩尔投票法，解决的问题是如何在任意多的候选人中，选出票数超过一半的那个人。注意，是超出一半票数的那个人。

假设投票是这样的，[A, C, A, A, B]，ABC 是指三个候选人。

第一张票与第二张票进行对坑，**如果票不同则互相抵消掉**；

接着第三票与第四票进行对坑，**如果票相同，则增加这个候选人的可抵消票数**；

这个候选人拿着可抵消票数与第五张票对坑，**如果票不同，则互相抵消掉，即候选人的可抵消票数 -1**。

看下面动画，就可以理解最直观最清晰的答案了

#### 动画：摩尔投票法抵消阶段

![](D:\Visual-NMP-x64\www\leetcode\editor\cn\image\[229]majorityElement\1.png)

![2](D:\Visual-NMP-x64\www\leetcode\editor\cn\image\[229]majorityElement\2.png)

![3](D:\Visual-NMP-x64\www\leetcode\editor\cn\image\[229]majorityElement\3.png)

![4](D:\Visual-NMP-x64\www\leetcode\editor\cn\image\[229]majorityElement\4.png)

![5](D:\Visual-NMP-x64\www\leetcode\editor\cn\image\[229]majorityElement\5.png)

![6](D:\Visual-NMP-x64\www\leetcode\editor\cn\image\[229]majorityElement\6.png)

![7](D:\Visual-NMP-x64\www\leetcode\editor\cn\image\[229]majorityElement\7.png)

![8](D:\Visual-NMP-x64\www\leetcode\editor\cn\image\[229]majorityElement\8.png)

看完上面的动画之后，相信已经理解摩尔投票法是如何选取一个最有希望的候选人的。

但这**不意味着这个候选人的票数一定能超过一半**，例如 [A, B, C] 的抵消阶段，最后得到的结果是 [C,1]，C 候选人的票数也未能超过一半的票数。

但是俺在这里发现了一个优化，如果最后得到的可抵消票数是 0 的话，那他已经无缘票数能超过一半的那个人了。因为本来可能有希望的，但是被后面的一张不同的票抵消掉了。所以，在这里可以直接返回结果，无需后面的计算了。

如果最后得到的抵消票数不为 0 的话，那说明他可能希望的，这是我们需要一个阶段来验证这个候选人的票数是否超过一半—— 计数阶段。

所以摩尔投票法分为两个阶段：**抵消阶段**和**计数阶段**。

**抵消阶段**：两个不同投票进行对坑，并且同时抵消掉各一张票，如果两个投票相同，则累加可抵消的次数；

**计数阶段**：在抵消阶段最后得到的抵消计数只要不为 0，那这个候选人是有可能超过一半的票数的，为了验证，则需要遍历一次，统计票数，才可确定。

摩尔投票法经历两个阶段最多消耗 O(2n)O(2n) 的时间，也属于 O(n)O(n) 的线性时间复杂度，另外空间复杂度也达到常量级。

理解摩尔投票法之后，我们再回到题目描述，题目可以看作是：在任意多的候选人中，选出票数超过⌊ 1/3 ⌋的候选人。

我们可以这样理解，假设投票是这样的 [A, B, C, A, A, B, C]，ABC 是指三个候选人。

第 1 张票，第 2 张票和第3张票进行对坑，如果票都不同，则互相抵消掉；

第 4 张票，第 5 张票和第 6 张票进行对坑，如果有部分相同，则累计增加他们的可抵消票数，如 [A, 2] 和 [B, 1]；

接着将 [A, 2] 和 [B, 1] 与第 7 张票进行对坑，如果票都没匹配上，则互相抵消掉，变成 [A, 1] 和 `[B, 0] 。

看下面动画，就知道什么回事了。

![](D:\Visual-NMP-x64\www\leetcode\editor\cn\image\[229]majorityElement\9.png)

![10](D:\Visual-NMP-x64\www\leetcode\editor\cn\image\[229]majorityElement\10.png)

![11](D:\Visual-NMP-x64\www\leetcode\editor\cn\image\[229]majorityElement\11.png)

![12](D:\Visual-NMP-x64\www\leetcode\editor\cn\image\[229]majorityElement\12.png)

![13](D:\Visual-NMP-x64\www\leetcode\editor\cn\image\[229]majorityElement\13.png)

![14](D:\Visual-NMP-x64\www\leetcode\editor\cn\image\[229]majorityElement\14.png)

![15](D:\Visual-NMP-x64\www\leetcode\editor\cn\image\[229]majorityElement\15.png)

![16](D:\Visual-NMP-x64\www\leetcode\editor\cn\image\[229]majorityElement\16.png)

![17](D:\Visual-NMP-x64\www\leetcode\editor\cn\image\[229]majorityElement\17.png)

**如果至多选一个代表，那他的票数至少要超过一半（⌊ 1/2 ⌋）的票数；**

**如果至多选两个代表，那他们的票数至少要超过 ⌊ 1/3 ⌋ 的票数；**

**如果至多选m个代表，那他们的票数至少要超过 ⌊ 1/(m+1) ⌋ 的票数。**
