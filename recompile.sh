sudo pwd
sleep 0.5
echo -e "\e[1;32mCleaning and flushing Cache.......\n\e[0m"
sudo php bin/magento cache:clean
sudo php bin/magento cache:flush
echo -e "\e[1;32mCache cleared\n\e[0m"
sleep 0.5
echo -e "\e[1;32mRemoving generated.......\n\e[0m"
sudo rm generated/* -r
echo -e "\e[1;32mRemoved generated\n\e[0m"
sleep 0.5
echo -e "\e[1;32mRemoving var/view_preprocessed.......\n\e[0m"
sudo rm var/view_preprocessed/* -r
echo -e "\e[1;32mRemoved var/view_preprocessed\n\e[0m"
sleep 0.5
echo -e "\e[1;32mRunning upgrade command.......\n\e[0m"
sudo php bin/magento setup:upgrade
echo -e "\e[1;32mUpgrade command completed\n\e[0m"
sleep 0.5
sudo php bin/magento setup:di:compile
sleep 0.5
echo -e "\e[1;32mRunning Static content deploy command.......\n\e[0m"
sudo php bin/magento setup:static-content:deploy -f
echo -e "\e[1;32mStatic content deploy completed\n\e[0m"
sleep 0.5
echo -e "\e[1;32mChanging ownership.......\n\e[0m"
sudo chown -R $USER:$USER pub var generated
sleep 0.5
echo -e "\e[1;32mChanging file permissions for var and pub directories.......\n\e[0m"
sudo chmod 0777 -R pub/static pub/media var generated
echo -e "\e[1;32mAll Done :) \e[0m"
