#!/bin/bash

#ansible-playbook -i hosts vagrant.yml

Ip="$(cat ../infraestructura.tmp | awk -F: '$1=="ip"{print $2}')"
Puerto="$(cat ../infraestructura.tmp | awk -F: '$1=="puerto"{print $2}')"
Key="$(cat ../infraestructura.tmp | awk -F: '$1=="key"{print $2}')"
DirectorioRemoto="$(cat ../infraestructura.tmp | awk -F: '$1=="directorioremoto"{print $2}')"
Hostname="$(cat ../infraestructura.tmp | awk -F: '$1=="hostname"{print $2}')"
Imagen="$(cat ../infraestructura.tmp | awk -F: '$1=="imagen"{print $2}')"
IpPrivada="$(cat ../infraestructura.tmp | awk -F: '$1=="ipprivada"{print $2}')"
IpPublica="$(cat ../infraestructura.tmp | awk -F: '$1=="ippublica"{print $2}')"
DirectorioExterno="$(cat ../infraestructura.tmp | awk -F: '$1=="direrctorioexterno"{print $2}')"
DirectorioInterno="$(cat ../infraestructura.tmp | awk -F: '$1=="directoriointerno"{print $2}')"
Adaptador="$(cat ../infraestructura.tmp | awk -F: '$1=="adaptador"{print $2}')"

mkdir -p ../servicios

for Servicio in $(cat ../servicios.tmp)
do
        cp -R /hdd-ext/aprovisionamiento/vagrant/ansible/$Servicio ../servicios
done

cd ../servicios
tar -czf servicios.tar.gz *
cd ../scripts

for EliminarServicio in $(cat ../servicios.tmp)
do
        rm -rf ../servicios/$EliminarServicio
done

echo 'Vagrant.configure(2) do |web|' > ../servicios/Vagrantfile
echo '' >> ../servicios/Vagrantfile
echo '   web.vm.hostname = "'$Hostname'"' >> ../servicios/Vagrantfile
echo '' >> ../servicios/Vagrantfile
echo '   web.vm.box = "'$Imagen'"' >> ../servicios/Vagrantfile
echo '' >> ../servicios/Vagrantfile
echo '   web.vm.network :private_network, ip: "'$IpPrivada'"' >> ../servicios/Vagrantfile
echo '   web.vm.network :public_network, bridge: "'$Adaptador'", ip: "'$IpPublica'"' >> ../servicios/Vagrantfile
echo '' >> ../servicios/Vagrantfile
echo '   web.vm.synced_folder "'$DirectorioExterno'", "'$DirectorioInterno'"' >> ../servicios/Vagrantfile
echo '' >> ../servicios/Vagrantfile
for Aprovisionamiento in $(cat ../servicios.tmp)
do
echo '   web.vm.provision "ansible" do |ansible|' >> ../servicios/Vagrantfile
echo '     ansible.playbook = "'$Aprovisionamiento'/'$Aprovisionamiento'.yml"' >> ../servicios/Vagrantfile
echo '   end' >> ../servicios/Vagrantfile
echo '' >> ../servicios/Vagrantfile
done
echo 'end' >> ../servicios/Vagrantfile

ssh -p $Puerto -i ../../../ssh_keys/$Key -o "StrictHostKeyChecking no" $Ip "mkdir -p /root/$DirectorioRemoto"
scp -P $Puerto -i ../../../ssh_keys/$Key -o "StrictHostKeyChecking no" ../servicios/* $Ip:$DirectorioRemoto
ssh -p $Puerto -i ../../../ssh_keys/$Key -o "StrictHostKeyChecking no" $Ip "cd /root/$DirectorioRemoto; tar -xzf servicios.tar.gz; rm servicios.tar.gz"

ssh -p $Puerto -i ../../../ssh_keys/$Key -o "StrictHostKeyChecking no" $Ip "cd /root/$DirectorioRemoto; vagrant up"

