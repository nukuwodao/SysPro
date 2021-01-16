#include<iostream>

using namespace std;

int main() {
  int N,A,B;

  cin >> N >> A >> B;

  int ans = min(N*A,B);

  cout << ans << endl;
}