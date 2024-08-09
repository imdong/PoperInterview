#!/bin/bash

# 用于测试的用例
inputs=(
  ""
  "[30,32,35,32,34,36,33,39,38,31,32,62,55,45,56,78,53,63,34,73,55,47,83,59,43,68,53,63,54,66,78,68,87,33,59,30,89,31,45,33,54,65,78,44,67,76,78,99,43,54,67,77,35,34]"
  "[10,13,23,17,29,31,23,13,64,45,23,73,45,67,23,67,44,88,31,63,73,23,9,21,34,12,45,27,83,45,26,84,12,56,12,73,67,12,79,32,23,12,65,23,66,45,63,12,76,34,23,55,46,32,46,23,87,23,59,34,75,26,67,34,75,43,65,29,66,86,34]"
  "[[1,15,13,15,26,37,12,54,23,44],[43,26,43,64,22,71,12,45,64,24],[22,41,37,62,44,35,32,57,23,23],[17,52,38,72,29,32,32,43,54,34],[14,35,53,27,22,32,23,55,24,87],[62,23,31,42,53,14,35,55,23,32],[22,43,19,42,79,34,80,34,69,43],[23,33,57,23,84,23,67,34,56,92],[83,23,44,56,34,54,74,58,43,34],[35,69,23,87,23,64,55,28,24,79],[34,92,34,68,23,56,82,27,24,35],[67,23,68,23,94,28,33,47,42,85]]"
  '"mfdnn323dfhh83dfsinnf23mdji5mmds49mdimf4fmidm4mdinondsn2pldsmooondnsi43nnidsi3ndnfjiemmsmfmfin4nnfinfndim4mmdfmidib4mdilh5m3mfndlfifdfjkdnsnsnin4nmdfmfdmi4nfnddnfnfidni4nkfdb4nnfkdlpnnd83jknds"'
)

# 遍历 inputs (忽略第一个成员)
for ((i = 1; i < ${#inputs[@]}; i++)); do
  echo "Question $i:"

  php main.php "$i" "${inputs[i]}"

  echo ""
done
