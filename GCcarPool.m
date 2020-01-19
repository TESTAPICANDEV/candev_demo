clc; clear; close all

predata = importdata('MOCK_DATA_TRAJET.xlsx');

class=predata.textdata;

qq= class(2:end,3);

class=cellstr(qq);
newChr = strrep(class,'Ontario','1');
newChr = strrep(newChr,'Colombie-Britannique','2');
newChr = strrep(newChr,'Île-du-Prince-Édouard','3');
newChr = strrep(newChr,'Manitoba','4');
newChr = strrep(newChr,'Nouvelle-Écosse','5');
newChr = strrep(newChr,'Alberta','6');
newChr = strrep(newChr,'Québec','7');
newChr = strrep(newChr,'Saskatchewan','8');
newChr = strrep(newChr,'Terre-Neuve-et-Labrador','9');
newChr = strrep(newChr,'Nouveau-Brunswick','10');
newChr = strrep(newChr,'Yukon','3');
newChr = strrep(newChr,'Nunavut','4');
newChr = strrep(newChr,'Territoires du Nord-Ouest','10');
class = str2double(newChr);

xdata = [predata.data class];
nb = size(xdata,2);
xdata = sortrows(xdata,nb);

data    = xdata(:,1:end-1);
Y_data  = xdata(:,end);

options = statset('MaxIter',10000);

% Number of classes
K = length(unique(Y_data));

gmod    = fitgmdist(data,K,'Options',options,'Replicates',5,'RegularizationValue', 0.01);
idx_G   = cluster(gmod,data);

clusterProv = zeros(1,K);
for c=1:K
    idc= idx_G==c;
    clusterProv(c)= sum(idc);
end

labels = {'Ontario','Colombie-Britannique','Île-du-Prince-Édouard','Manitoba','Nouvelle-Écosse',...
    'Alberta','Québec','Saskatchewan','Terre-Neuve-et-Labrador','Nouveau-Brunswick'};

pie(clusterProv)
 colormap(jet);
legend(labels,'Location','northeastoutside')
